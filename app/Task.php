<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

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
}
