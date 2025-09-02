<?php

namespace Novius\LaravelNovaRedirectManager;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Nova;

class RedirectManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            Nova::resources([
                config('laravel-nova-redirects.redirect_nova_resource'), // Load Redirect Nova resource
            ]);
        });

        $packageDir = dirname(__DIR__);

        $this->publishes([$packageDir.'/config' => config_path()], 'config');

        $this->loadMigrationsFrom($packageDir.'/database/migrations');

        $this->loadTranslationsFrom($packageDir.'/resources/lang', 'laravel-nova-redirect-manager');
        $this->publishes([__DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-nova-redirect-manager')], 'lang');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-nova-redirects.php',
            'laravel-nova-redirects'
        );
    }
}
