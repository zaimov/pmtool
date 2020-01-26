<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
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
        $this->authorize('update', $project);

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
    public function store(StoreProjectRequest $request)
    {
        $project = auth()->user()->projects()->create($request->validated());

        return redirect($project->path());
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update a project.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);
        $project->update($request->validated());

        return redirect($project->path());
    }
}
