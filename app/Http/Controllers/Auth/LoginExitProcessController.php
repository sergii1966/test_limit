<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\LoginExitProcessContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginExitProcessController extends Controller
{
     /**
     * Handle the incoming request.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, LoginExitProcessContract $process)
    {
        $process->loginExit($request);

        return redirect()->back();
    }
}
