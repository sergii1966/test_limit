<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLimit extends Model
{
    protected $table = 'users_limits';

    protected $fillable = [
        'user_id',
        'ip',
        'user_time',
    ];

}
