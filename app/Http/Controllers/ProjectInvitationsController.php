<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjectInvitationRequest;
use App\Project;
use App\User;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project, ProjectInvitationRequest $request)
    {
        $this->authorize('administer', $project);
        $user = User::whereEmail(request('email'))->first();
        $project->invite($user);
        return redirect($project->path());
    }
}
