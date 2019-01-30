<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itCanHaveAPath()
    {
        $project = factory('App\Project')->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }

    /** @test */
    public function itCanHaveAnOwner()
    {
        $this->be(factory(\App\User::class)->create());

        $project = factory(\App\Project::class)->create([
            'owner_id' => auth()->user()->id
        ]);

        $this->assertInstanceOf('\App\User', $project->owner);
    }
}
