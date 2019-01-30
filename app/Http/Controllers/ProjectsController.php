<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    /** returns the projects view */
    public function index()
    {
        $projects = Project::all();

        return view('app.projects.index', compact('projects'));
    }

    /** returns the asked for project */
    public function show(Project $project)
    {
        return view('app.projects.show', compact('project'));
    }

    /** store the given data */
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        auth()->user()->projects()->create($data);
    }
}
