<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guestsCannotManageProjects()
    {
        $project = factory(\App\Project::class)->create();

        $this->post('/projects')->assertRedirect('login');
        $this->get('/projects')->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->makeUser();

        $this->get('/projects/create')->assertStatus(200);

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
    public function aUserCanOnlySeeTheirProjects()
    {
        $this->be(factory(\App\User::class)->create());

        $project = factory('App\Project')->create([
            'owner_id' => auth()->user()->id++
        ]);

        $this->get('projects')->assertDontSee($project->title);
    }

    /** @test */
    public function aUserCannotSeeAProjectTheyDontOwn()
    {
        $this->be(factory(\App\User::class)->create());

        $project = factory('App\Project')->create([
            'owner_id' => auth()->user()->id++
        ]);

        $this->get($project->path())->assertStatus(403);
    }
}
