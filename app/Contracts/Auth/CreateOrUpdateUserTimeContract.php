<?php

namespace App\Contracts\Auth;

interface CreateOrUpdateUserTimeContract
{
    public function __construct(string $relation);
    public function createOrUpdate(): bool;
}
