<?php

namespace App\Providers;

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->registerMiddleware();
    }
    
    protected function registerMiddleware()
    {
        // Register admin middleware here
        Route::middlewareGroup('admin', [AdminMiddleware::class]);
    }
}
