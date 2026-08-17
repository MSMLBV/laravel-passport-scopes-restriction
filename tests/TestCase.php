<?php

namespace MSML\PassportScopeRestriction\Tests;

use MSML\PassportScopeRestriction\PassportClientServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            PassportClientServiceProvider::class,
        ];
    }
}
