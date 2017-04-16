<?php

namespace interactivesolutions\honeycombapps\app\providers;

use interactivesolutions\honeycombcore\providers\HCBaseServiceProvider;

class HCAppsServiceProvider extends HCBaseServiceProvider
{
    protected $homeDirectory = __DIR__;

    protected $commands = [];

    protected $namespace = 'interactivesolutions\honeycombapps\app\http\controllers';

    public $serviceProviderNameSpace = 'HCApps';
}





