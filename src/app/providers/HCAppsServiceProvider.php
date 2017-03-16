<?php

namespace interactivesolutions\honeycombapps\app\providers;

use Illuminate\Routing\Router;
use interactivesolutions\honeycombapps\app\http\middleware\AuthApps;
use interactivesolutions\honeycombcore\providers\HCBaseServiceProvider;

class HCAppsServiceProvider extends HCBaseServiceProvider
{
    protected $homeDirectory = __DIR__;

    protected $commands = [];

    protected $namespace = 'interactivesolutions\honeycombapps\app\http\controllers';

    /**
     * @param Router $router
     */
    protected function registerRouterItems (Router $router)
    {
        $router->middleware ('auth-apps', AuthApps::class);
    }
}


