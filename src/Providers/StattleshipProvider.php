<?php

namespace Garrett9\Stattleship\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Garrett9\Stattleship\Baseball\IBaseballStattleshipClient;
use Garrett9\Stattleship\Baseball\BaseballStattleshipClient;
use Garrett9\Stattleship\IStattleshipClientFactory;
use Garrett9\Stattleship\StattleshipClientFactory;

/**
 * A provider for registering the resources from the Strattleship Plugin.
 * 
 * @author garrettshevach@gmail.com
 *
 */
class StattleshipProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/strattleship.php' => config_path('strattleship.php') 
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IBaseballStattleshipClient::class, function($app) {
            $config = $app->make(Repository::class);
            return new BaseballStattleshipClient($config->get('stattleship.access_token')); 
        });
        
        $this->app->bind(IStattleshipClientFactory::class, function($app) {
            $config = $app->make(Repository::class);
            return new StattleshipClientFactory($config->get('stattleship.access_token'));
        });
    }
}
