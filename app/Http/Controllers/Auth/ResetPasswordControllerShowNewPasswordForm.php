<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordControllerShowNewPasswordForm extends Controller
{
    public function __invoke(Request $request)
    {
        $token = $request->token;

        return view('auth.reset-password', ['token' => $token]);
    }
}
