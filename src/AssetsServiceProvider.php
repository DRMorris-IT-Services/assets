<?php
namespace duncanrmorris\assets;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Controller;
use App\User;


class AssetsServiceProvider extends ServiceProvider

{
    
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','assays');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
    }

    public function register()
    {
        
    }
}

