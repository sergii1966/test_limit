<?php

namespace App\Http\Actions\Auth;

use App\Contracts\Auth\LoginExitProcessContract;

class LoginExitProcessAction implements LoginExitProcessContract
{

    public function loginExit($request): void
    {
        auth('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
    }
}
