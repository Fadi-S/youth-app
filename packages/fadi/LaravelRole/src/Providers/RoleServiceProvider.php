<?php

namespace Fadi\LaravelRole\Providers;

use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '../../database/migrations');

        $this->publishes([
            __DIR__ . '../../config/roles.php' => config_path('roles.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/roles.php', 'roles'
        );
    }
}
