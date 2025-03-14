<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\ResetPasswordProcessContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordProcessRequest;
use Illuminate\Support\Facades\Password;

class ResetPasswordProcessController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ResetPasswordProcessRequest $request, ResetPasswordProcessContract $process)
    {
        $process->dataValidate($request);

        return ($status = $process->reset($request)) === Password::PASSWORD_RESET
            ? redirect()->route('login.form')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
