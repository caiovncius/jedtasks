<?php

namespace App\Providers;

use App\Account\Contracts\AccountCreatable;
use App\Account\Contracts\AccountPasswordUpdatable;
use App\Account\Contracts\AccountProfileUpdatable;
use App\Account\Contracts\AccountWorkspaceUpdatable;
use App\Account\Services\AccountCreator;
use App\Account\Services\AccountPasswordUpdator;
use App\Account\Services\AccountProfileUpdator;
use App\Account\Services\AccountWorkspaceUpdator;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AccountCreatable::class, AccountCreator::class);
        $this->app->bind(AccountProfileUpdatable::class, AccountProfileUpdator::class);
        $this->app->bind(AccountPasswordUpdatable::class, AccountPasswordUpdator::class);
        $this->app->bind(AccountWorkspaceUpdatable::class, AccountWorkspaceUpdator::class);
    }
}
