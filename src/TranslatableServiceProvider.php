<?php

namespace Zoomyboy\Translatable;

use Illuminate\Support\ServiceProvider;

class TranslatableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publish a config file
        $this->publishes([
            __DIR__.'/../config/laravel-translatable.php' => config_path('laravel-translatable.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-translatable.php', 'laravel-translatable');
    }
}
