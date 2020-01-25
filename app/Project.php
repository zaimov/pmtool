<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    /**
     * Get the path of the project.
     */
    public function path()
    {
        return "/projects/{$this->id}";
    }


    /**
     * Get the user that the project belongs to.
     */
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tasks for the project.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Add task related to the project.
     */
    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }
}
