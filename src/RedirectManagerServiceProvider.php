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
               config('missing-page-redirector.redirect_nova_resource'), // Load Redirect Nova resource
            ]);
        });

        $packageDir = dirname(__DIR__);

        $this->publishes([$packageDir.'/config' => config_path()], 'config');

        $this->publishes([$packageDir.'/database/migrations' => database_path('migrations')], 'migrations');
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
        if (file_exists(config_path('missing-page-redirector.php'))) {
            $this->mergeConfigTo(config_path('missing-page-redirector.php'), 'missing-page-redirector');
        }

        $this->mergeConfigTo(
            __DIR__.'/../config/laravel-nova-redirects.php',
            'missing-page-redirector'
        );
    }

    /**
     * Merges the specified config from another package. Does the opposite of mergeConfigFrom().
     *
     * @param $path
     * @param $key
     */
    protected function mergeConfigTo($path, $key)
    {
        $config = $this->app['config']->get($key, []);

        $this->app['config']->set($key, array_merge($config, require $path));
    }
}
