<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class ComposerServiceProvider extends ServiceProvider
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
        view()->composer('master.customer.*', function ($view) {
            $view->with('page', 'Customer');
        });
        view()->composer('master.transaction.*', function ($view) {
            $view->with('page', 'Order');
        });
    }
}