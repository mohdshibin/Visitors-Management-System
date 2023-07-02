<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Interfaces\AdminInterface',
            'App\Repositories\AdminRepository'
        );
        $this->app->bind(
            'App\Interfaces\VisitorInterface',
            'App\Repositories\VisitorRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
