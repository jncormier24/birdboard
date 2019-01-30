<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itCanHaveAPaht()
    {
        $project = factory('App\Project')->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }
}
