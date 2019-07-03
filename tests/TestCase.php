<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase,
    Illuminate\Foundation\Testing\WithFaker,
    Illuminate\Foundation\Testing\RefreshDatabase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase, CreatesApplication, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory('App\Models\Users')->create();
        $this->withoutExceptionHandling();
    }
}
