<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project()
    {
        $data = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];

        $this->post('/projects', $data);

        $this->assertDatabaseHas('projects', $data);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $project = factory(\App\Project::class)->raw(['title' => '']);

        $this->post('/projects', $project)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $project = factory(\App\Project::class)->raw(['description' => '']);

        $this->post('/projects', $project)->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_user_can_see_projects()
    {
        $project = factory(\App\Project::class)->create();

        $this->get('/projects')->assertSee($project->title);
    }

    /** @test */
    public function a_user_can_see_a_project()
    {
        $project = factory('App\Project')->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }
}
