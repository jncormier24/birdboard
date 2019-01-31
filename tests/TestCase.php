<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function makeUser($user = null)
    {
        return $this->be($user ?? factory(\App\User::class)->create());
    }
}
