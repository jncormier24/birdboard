<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectsController extends Controller
{
    /** returns the projects view */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('app.projects.index', compact('projects'));
    }

    /** returns the asked for project */
    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }
        return view('app.projects.show', compact('project'));
    }

    /** retunrs the create form for a project */
    public function create()
    {
        return view('app.projects.create');
    }

    /** store the given data */
    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        auth()->user()->projects()->create($data);

        return redirect()->route('projects.index');
    }
}
