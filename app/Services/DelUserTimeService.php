<?php

namespace App\Services;

use App\Models\UsersLimit;

class DelUserTimeService
{
    public function delete():bool
    {
        if(UsersLimit::query()->where([
            'user_id' => auth('web')->id(),
            'ip' => $_SERVER['REMOTE_ADDR']
        ])->delete()){
            return true;
        }

        return false;
    }
}
