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
        Blade::component('components.fields.text', 'field');
        Blade::component('components.fields.form', 'form');
        Blade::component('components.fields.submit', 'submit');

        // Layout partials
        Blade::component('components.layout.card', 'card');
        Blade::component('components.layout.formfooter', 'formfooter');
    }
}
