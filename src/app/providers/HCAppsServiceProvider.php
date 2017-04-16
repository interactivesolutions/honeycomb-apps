<?php

namespace interactivesolutions\honeycombapps\app\providers;

use Illuminate\Routing\Router;
use interactivesolutions\honeycombapps\app\http\middleware\HCAuthApps;
use interactivesolutions\honeycombcore\providers\HCBaseServiceProvider;

class HCAppsServiceProvider extends HCBaseServiceProvider
{
    protected $homeDirectory = __DIR__;

    protected $commands = [];

    protected $namespace = 'interactivesolutions\honeycombapps\app\http\controllers';

    public $serviceProviderNameSpace = 'HCApps';

    protected function registerMiddleWare (Router $router)
    {
        $router->middleware('auth-apps', HCAuthApps::class);
    }
}





