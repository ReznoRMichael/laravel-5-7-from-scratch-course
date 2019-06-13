<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // registered will be called for every single method in the config/app.php file

        $this -> app -> bind(
            \App\Repositories\UserRepository::class,
            \App\Repositories\DbUserRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('welcome', 'Welcome');
        View::share('rzr', 'ReznoR');
        View::share('about', 'About');
        View::share('contact', 'Contact');
        View::share('pro', 'Projects');
        View::share('create', 'Create Project');
    }
}
