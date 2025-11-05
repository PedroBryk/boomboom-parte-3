<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;

abstract class UnitTestCase extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
