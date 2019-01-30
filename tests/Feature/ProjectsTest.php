<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_user_must_be_logged_in_to_create_a_project()
    {
        $project = [];

        $this->post('/projects', $project)->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->be(factory(\App\User::class)->create());

        $data = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
        ];

        $this->post('/projects', $data);

        $this->assertDatabaseHas('projects', $data);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->be(factory(\App\User::class)->create());
        $project = factory(\App\Project::class)->raw(['title' => '']);

        $this->post('/projects', $project)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->be(factory(\App\User::class)->create());
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
