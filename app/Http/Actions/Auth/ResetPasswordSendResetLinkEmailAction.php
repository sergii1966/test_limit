<?php

namespace App\Http\Actions\Auth;

use App\Contracts\Auth\ResetPasswordSendResetLinkEmailContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordSendResetLinkEmailAction implements ResetPasswordSendResetLinkEmailContract
{
   public function dataValidate(Request $request): ?array
    {
        $request->validated();
        return null;
    }

    public function sendLink(Request $request): mixed
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status;
    }
}
