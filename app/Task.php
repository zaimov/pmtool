<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

     /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['project'];

    /**
     * Get the project that the task belongs to.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the path of the task.
     */
    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }

    /**
     * Get the activities for the project.
     */
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest(); 
    }

    /**
     * Record activity for a project.
     */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }

    /**
     * Mark the project related task as complete.
     */
    public function complete()
    {
        $this->update(['completed' => true]);
        $this->recordActivity('task_completed');
    }

    /**
     * Mark the project related task as incomplete.
     */ 
    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->recordActivity('task_incompleted');
    }
}
