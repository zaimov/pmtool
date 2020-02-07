<div class="project__invitations mt-3 card global__card">
    <div class="col-sm-12">
        <h4 class="mt-3 mb-3">Invite a user</h4>

        <form action="{{ $project->path() . '/invitations' }}" method="POST">
            @csrf

            <input type="email" name="email" class="form-control" placeholder="Email address">
            <button class="btn btn-primary btn-sm mt-3" type="submit">Invite a Member</button>
        </form>
    </div>
</div>