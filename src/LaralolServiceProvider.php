<?php

namespace Devtemple\Laralol;

use Illuminate\Support\ServiceProvider;

/**
 * LaraLol Service Provider
 */
class LaralolServiceProvider extends ServiceProvider
{
    /**
     * List of Facades which should be registered
     * @var array $facades List of facades
     */
    protected $facades = [
        'champion' => '\Devtemple\Laralol\Classes\Champion',
        'summoner' => '\Devtemple\Laralol\Classes\Summoner',
        'lol-status' => '\Devtemple\Laralol\Classes\LolStatus',
        'spectator' => '\Devtemple\Laralol\Classes\Spectator'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laralol.php' => config_path('laralol.php'),
        ], 'laralol-config');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindFacades();

        $this->mergeConfigFrom(
            __DIR__.'/../config/laralol.php', 'laralol'
        );
    }

    /**
     * Binding facades from facades property
     */
    private function bindFacades()
    {
        foreach ($this->facades as $name => $facade) {
            app()->bind($name, function () use ($facade) {
                return new $facade;
            });
        }
    }
}
