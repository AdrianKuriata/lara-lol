<?php

namespace Devtemple\Laralol;

use Illuminate\Support\ServiceProvider;

class LaralolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laralol.php' => config_path('laralol.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind('champion', function () {
            return new \Devtemple\Laralol\Classes\Champion;
        });

        app()->bind('summoner', function () {
            return new \Devtemple\Laralol\Classes\Summoner;
        });

        $this->mergeConfigFrom(
            __DIR__.'/../config/laralol.php', 'laralol'
        );
    }
}
