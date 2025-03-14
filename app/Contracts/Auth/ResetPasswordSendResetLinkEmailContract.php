<?php

namespace App\Contracts\Auth;

use Illuminate\Http\Request;

interface ResetPasswordSendResetLinkEmailContract
{
    public function dataValidate(Request $request): ?array;

    public function sendLink(Request $request): mixed;
}
