<?php

namespace Magdicom\TestInitial\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Magdicom\TestInitial\TestInitialServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            TestInitialServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
