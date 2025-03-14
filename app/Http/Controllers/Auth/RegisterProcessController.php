<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\RegisterProcessContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterProcessRequest;

class RegisterProcessController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(
        RegisterProcessRequest $request,
        RegisterProcessContract $register_process
    )
    {
        $register_process->dataValidate($request);

        return $register_process->registerUser($request) ?
            redirect()
                ->route('home')
            :
            redirect()
                ->route('home')
                ->with('error', __('auth.An error occurred while processing your request'))
            ;
    }
}
