<?php

namespace App\Services;

use App\Models\UsersLimit;

class DelAllOldUserTimeService
{
    public function delete(): bool
    {
        $users = UsersLimit::query()
            ->where('user_time', '<=', time() - config('auth',)['check_time_activity_sec'])
            ->get();

        if($users->isEmpty()){
            return false;
        }

        foreach ($users as $user){
            if(!($user->delete())){
                return false;
            }
        }

        return true;
    }
}

