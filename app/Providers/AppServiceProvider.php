<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Fields
        Blade::aliasComponent('components.fields.text', 'field');
        Blade::aliasComponent('components.fields.form', 'form');
        Blade::aliasComponent('components.fields.submit', 'submit');

        // Layout partials
        Blade::aliasComponent('components.layout.card', 'card');
        Blade::aliasComponent('components.layout.formfooter', 'formfooter');
        Blade::aliasComponent('components.layout.message', 'alert');
        Blade::aliasComponent('components.layout.out-logo', 'outlogo');
    }
}
