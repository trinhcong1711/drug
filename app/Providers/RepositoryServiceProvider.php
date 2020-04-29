<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\Units\UnitRepository::class, \App\Repositories\Units\UnitRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CURDBaseRepository::class, \App\Repositories\CURDBaseRepositoryEloquent::class);
    }
}
