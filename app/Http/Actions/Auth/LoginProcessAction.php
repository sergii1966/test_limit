<?php

namespace App\Http\Actions\Auth;

use App\Contracts\Auth\LoginProcessContract;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginProcessAction implements LoginProcessContract
{
    public function dataValidate($request): ?array
    {
        $request->validated();

        return null;
    }
   public function sessionRegenerate($request): void
   {
       $request->session()->regenerate();
   }

    /**
     * @param $request
     * @return void
     * @throws ValidationException
     */
    public function loginUser($request): void
    {
        $this->ensureIsNotRateLimited($request);

        if (! Auth::guard('web')->attempt($request->only('email', 'password'), $request->boolean('remember'))) {

           RateLimiter::hit($this->throttleKey($request));
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        auth('web')->login(Auth::guard('web')->user());
        RateLimiter::clear($this->throttleKey($request));
    }

    /**
     * Ensure the login request is not rate limited.
     */
    protected function ensureIsNotRateLimited($request): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        event(new Lockout($request));

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    protected function throttleKey($request): string
    {
        return Str::transliterate(Str::lower($request->string('email')).'|'.$request->ip());
    }
}
