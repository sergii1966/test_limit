<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Auth\CreateOrUpdateUserTimeContract;
use App\Contracts\Auth\LoginProcessContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginProcessRequest;
use Illuminate\Validation\ValidationException;

class LoginProcessController extends Controller
{
    /**
     * @param LoginProcessRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function __invoke(
        LoginProcessRequest $request,
        LoginProcessContract $login_process,
        CreateOrUpdateUserTimeContract  $create_user_time
    )
    {
        $login_process->dataValidate($request);

        $login_process->loginUser($request);

        $login_process->sessionRegenerate($request);

        if (auth('web')->check()){

            if(!$create_user_time->createOrUpdate()){

                auth('web')->logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                return redirect()->route('home')->with('error', 'Щось пішло не так!');
            }

            return redirect()->route('profile')->with('success', 'Все Ок!');
        }

        return redirect()->route('home')->with('error', 'Щось пішло не так!');
    }
}
