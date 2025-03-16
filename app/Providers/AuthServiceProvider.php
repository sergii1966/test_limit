<?php

namespace App\Providers;

use App\Contracts\Auth\CreateOrUpdateUserTimeContract;
use App\Contracts\Auth\LoginExitProcessContract;
use App\Contracts\Auth\LoginProcessContract;
use App\Contracts\Auth\RegisterProcessContract;
use App\Contracts\Auth\ResetPasswordProcessContract;
use App\Contracts\Auth\ResetPasswordSendResetLinkEmailContract;
use App\Http\Actions\Auth\CreateOrUpdateUserTimeAction;
use App\Http\Actions\Auth\LoginExitProcessAction;
use App\Http\Actions\Auth\LoginProcessAction;
use App\Http\Actions\Auth\RegisterProcessAction;
use App\Http\Actions\Auth\ResetPasswordProcessAction;
use App\Http\Actions\Auth\ResetPasswordSendResetLinkEmailAction;
use App\Services\DelUserTimeService;
use App\Services\SetUserTimeService;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(LoginProcessContract::class, function ($app) {
            return new LoginProcessAction();
        });
        $this->app->bind(RegisterProcessContract::class, RegisterProcessAction::class);
        $this->app->bind(LoginExitProcessContract::class, LoginExitProcessAction::class);
        $this->app->bind(ResetPasswordProcessContract::class, ResetPasswordProcessAction::class);
        $this->app->bind(ResetPasswordSendResetLinkEmailContract::class, ResetPasswordSendResetLinkEmailAction::class);

        $this->app->bind(CreateOrUpdateUserTimeContract::class, function (){
            return new CreateOrUpdateUserTimeAction('userslimits');
        });

        $this->app->bind('setusertime', function ($app) {
            return (new SetUserTimeService('userslimits'));
        });

        $this->app->bind('delusertime', function ($app) {
            return (new DelUserTimeService());
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
