<?php

namespace App\Contracts\Auth;

use Illuminate\Http\Request;

interface ResetPasswordProcessContract
{
    public function dataValidate(Request $request): ?array;
    public function reset(Request $request): mixed;
}
