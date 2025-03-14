<?php

namespace App\Http\Actions\Auth;

use App\Contracts\Auth\CreateOrUpdateUserTimeContract;
use App\Models\User;
use App\Traits\SetUserTimeTrait;

class CreateOrUpdateUserTimeAction implements CreateOrUpdateUserTimeContract
{
    use SetUserTimeTrait;
}
