<?php

namespace App\Contracts\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

interface RegisterProcessContract
{
    public function dataValidate($request): ?array;
    public function registerUser($request): bool|Authenticatable;
}
