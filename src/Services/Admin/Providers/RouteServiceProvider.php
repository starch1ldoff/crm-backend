<?php

namespace App\Services\Admin\Providers;

use Illuminate\Routing\Router;
use Lucid\Foundation\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Read the routes from the "api.php" and "web.php" files of this Service
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function map(Router $router)
    {
        $namespace = 'App\Services\Admin\Http\Controllers';
        $pathApi = __DIR__.'/../routes/api.php';

        $router->group([
            'middleware' => 'api',
            'namespace'  => $namespace,
            'prefix'     => 'api/v1',
        ], function ($router) use ($pathApi) {
            require $pathApi;
        });

    }
}
