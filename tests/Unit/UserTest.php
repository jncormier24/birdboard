<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itCanHaveProjects()
    {
        $user = factory(\App\User::class)->create();
        $project = factory(\App\Project::class)->create(['owner_id' => $user->id ]);

        $this->assertInstanceOf(Collection::class, $user->projects);
    }
}
