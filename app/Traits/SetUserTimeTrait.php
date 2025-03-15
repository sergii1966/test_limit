<?php

namespace App\Traits;

use App\Models\User;

trait SetUserTimeTrait
{
    public function __construct(public ?string $relation)
    {

    }

    /**
     * @return bool
     */
    public function createOrUpdate(): bool
    {
        $model = User::query()->where([
            'id' => auth('web')->id()
        ])->first();

        if($model->{$this->relation}()->updateOrCreate(
            [
                'user_id' => auth('web')->id(),
                'ip' => $_SERVER['REMOTE_ADDR']
            ], ['user_id' => auth('web')->id(), 'user_time' => time(), 'ip' => $_SERVER['REMOTE_ADDR']])){

            return true;
        }

        return false;
    }
}
