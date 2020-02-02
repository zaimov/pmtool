<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];

    public $oldValues = [];

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

    /**
     * Get the activities for the project.
     */
    public function activity()
    {
        return $this->hasMany(Activity::class)->latest(); 
    }

    /**
     * Record activity for a project.
     */
    public function recordActivity($type)
    {
        Activity::create([
            'user_id' => ($this->project ?? $this)->owner->id,
            'project_id' => $this->id,
            'description' => $type,
            'changes' => $this->activityChanges($type)
        ]);
    }

    /**
     * Record an update of an `activity for a project.
     */
    protected function activityChanges($type)
    {
        if ($type == 'updated') {
            return [
                'before' => array_except(array_diff($this->oldValues, $this->getAttributes()), ['updated_at']),
                'after' => array_except($this->getChanges(), ['updated_at'])
            ];
        }
    }

    public function invite(User $user)
    {
        return $this->members->attach($user);
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'prpject_members');
    }
}
