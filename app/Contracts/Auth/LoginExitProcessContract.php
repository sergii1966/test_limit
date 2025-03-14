<?php

namespace App\Contracts\Auth;

interface LoginExitProcessContract
{
    public function loginExit($request): void;

}
