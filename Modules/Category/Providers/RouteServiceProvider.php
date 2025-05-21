<?php

namespace Modules\Category\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $moduleNamespace = 'Modules\Category\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();

        // $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    // protected function mapWebRoutes(): void
    // {
    //     Route::middleware('web')->group(module_path('Category', '/Routes/web.php'));
    // }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('Category', '/Routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    // protected function mapApiRoutes(): void
    // {
    //     Route::middleware('api')->prefix('api')->name('api.')->group(module_path('Category', '/Routes/api.php'));
    // }

    protected function mapApiRoutes()
    {
        Route::prefix('api')->middleware('api')->namespace($this->moduleNamespace)->group(module_path('Category', '/Routes/api.php'));
    }
}
