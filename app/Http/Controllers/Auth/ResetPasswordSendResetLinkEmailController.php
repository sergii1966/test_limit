<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\ResetPasswordSendResetLinkEmailContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordSendResetLinkEmailRequest;
use Illuminate\Support\Facades\Password;

class ResetPasswordSendResetLinkEmailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        ResetPasswordSendResetLinkEmailRequest $request,
        ResetPasswordSendResetLinkEmailContract $process
    ) {
        $process->dataValidate($request);

        return ($status = $process->sendLink($request)) === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
