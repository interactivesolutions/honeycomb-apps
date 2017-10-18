<?php

declare(strict_types = 1);

namespace Tests;


use Illuminate\Foundation\Application;
use InteractiveSolutions\HoneycombAcl\Providers\HCACLServiceProvider;
use interactivesolutions\honeycombapps\app\providers\HCAppsServiceProvider;

/**
 * Class TestCase
 * @package Tests
 */
abstract class TestCase extends \Orchestra\Testbench\BrowserKit\TestCase
{
    /**
     *
     */
    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [
            HCAppsServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }
}