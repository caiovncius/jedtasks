<?php

namespace App\Providers;

use App\Account\Contracts\AccountCreatable;
use App\Account\Services\AccountCreator;
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
    }
}
