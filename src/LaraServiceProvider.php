<?php

namespace Lara;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class LaraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/lara.php', 'lara');

        // Register event service
        // $this->app->register(LaraEventServiceProvider::class);

        // Facade shortcut accesor class binding
        // $this->app->bind('lara', function ($app) {
        // 	return new Lara();
        // });

        // Disable csrf protection laravel 13
        // PreventRequestForgery::except(['lara/notify']);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureLoads();
        $this->configurePublishing();
        $this->configureComponents();
        // $this->configureRoutes();
    }

    /**
     * Configure the loads offered by the application.
     *
     * @return void
     */
    protected function configureLoads()
    {
        // Register theme, views namespace lara::email.default
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lara');
        // $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        // $this->loadTranslationsFrom(__DIR__ . '/../lang', 'lara');
        // $this->loadJsonTranslationsFrom(__DIR__ . '/../lang');
    }

    /**
     * Configure the routes offered by the application.
     *
     * @return void
     */
    protected function configureRoutes()
    {
        Route::group([
            'as' => config('lara.route.name', 'lara.'),
            'prefix' => config('lara.route.prefix', 'lara'),
            'domain' => config('lara.route.domain', null),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
        });
    }

    /**
     * Configure the publishable resources offered by the package.
     *
     * @return void
     */
    protected function configurePublishing()
    {
        // Overwrite data
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/lara.php' => config_path('lara.php'),
            ], ['lara', 'lara-config']);

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/lara')
            ], 'lara-views');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/lara')
            ], 'lara-images');

            // $this->publishes([
            //     __DIR__ . '/../database/migrations' => database_path('migrations'),
            // ], 'lara-migrations');

            // $this->publishes([
            //     __DIR__ . '/../lang' => base_path('lang/vendor/lara'),
            // ], 'lara-lang');
        }
    }

    /**
     * Configure the loads offered by the application.
     *
     * @return void
     */
    function configureComponents()
    {
        // Load components from namespace (does not work for package Class components)
        // Blade::componentNamespace('Lara\\Views\\Components', 'lara');

        // Load components manually (works with Class components use dash '-')
        Blade::component('lara-alert', \Lara\View\Components\Alert::class);
    }
}
