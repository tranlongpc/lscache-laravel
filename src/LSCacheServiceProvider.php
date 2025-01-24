<?php

namespace Litespeed\LSCache;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Contracts\Http\Kernel;

class LSCacheServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router, Kernel $kernel)
    {
        if(config('lscache.enabled')) {
            $router->pushMiddlewareToGroup('website', LSCacheMiddleware::class);
            $router->aliasMiddleware('lscache', LSCacheMiddleware::class);
            $router->aliasMiddleware('lstags', LSTagsMiddleware::class);
        }
    }
}
