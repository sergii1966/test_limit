<?php

namespace App\Http\Actions\Auth;

use App\Contracts\Auth\RegisterProcessContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterProcessAction implements RegisterProcessContract
{
    public function dataValidate($request): ?array
    {
        $request->validated();

        return null;
    }

    public function registerUser($request): bool
    {
        if ($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ])) {

            session()->forget(['status-verification-link-sent']);

            return true;
        }

        return false;
    }
}
