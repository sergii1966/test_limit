<?php

namespace App\Services;

use App\Contracts\Auth\CreateOrUpdateUserTimeContract;
use App\Traits\SetUserTimeTrait;

class SetUserTimeService implements CreateOrUpdateUserTimeContract
{
    use SetUserTimeTrait;
}
