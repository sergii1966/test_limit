<?php

namespace App\Contracts\Auth;

use Illuminate\Http\Request;

interface LoginProcessContract
{
    public function dataValidate(Request $request): ?array;

    public function loginUser(Request $request): void;

    public function sessionRegenerate(Request $request): void;
}
