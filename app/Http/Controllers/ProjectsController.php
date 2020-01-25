<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * View all projects.
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * Show a single project.
     */
    public function show(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    /**
     * Create a project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Persist the project in the database.
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);
        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    /**
     * Update a project.
     */
    public function update(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }

        $project->update([
            'notes' => request('notes')
        ]);

        return redirect($project->path());
    }
}
