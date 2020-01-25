<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{
    /**
     * Add a task to the related project.
     */
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);
        $project->addTask(request('body'));

        return redirect($project->path());
    }

    /**
     * Update the project
     */
    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);


        request()->validate(['body' => 'required']);

        $task->update([
            'body' => request('body'),
            'completed' => request()->has('completed')
        ]);

        return redirect($project->path());
    }
}
