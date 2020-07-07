<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contracts\CustomerServiceContract::class,
            \App\Services\CustomerService::class
        );
        $this->app->bind(
            \App\Services\Contracts\ProductServiceContract::class,
            \App\Services\ProductService::class
        );
        $this->app->bind(
            \App\Services\Contracts\TransactionServiceContract::class,
            \App\Services\TransactionService::class
        );
        $this->app->bind(
            \App\Services\Contracts\UserServiceContract::class,
            \App\Services\UserService::class
        );
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}