<?php

namespace interactivesolutions\honeycombapps\app\providers;

use Illuminate\Routing\Router;
use interactivesolutions\honeycombapps\app\http\middleware\AuthApps;
use interactivesolutions\honeycombcore\providers\HCBaseServiceProvider;

class HCAppsServiceProvider extends HCBaseServiceProvider
{
    /**
     * Register commands
     *
     * @var array
     */
    protected $commands = [];

    protected $namespace = 'interactivesolutions\honeycombapps\app\http\controllers';

    /**
     * @param Router $router
     */
    protected function registerMiddleware (Router $router)
    {
        $router->middleware ('auth-apps', AuthApps::class);
    }
}


