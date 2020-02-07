<div class="card shadow-sm global__card projects__card">
    <div class="card-header">
        <h4 class="my-0 projects__title">
            <a href="{{ $project->path() }}">{{ $project->title }}</a>
        </h4>
    </div>
    <div class="card-body">
        {{ Str::limit($project->description, 100) }}
    </div>
    <div class="projects__delete d-flex justify-content-left">
        <form method="POST" action="{{ $project->path() }}" class="text-right">
            @method('DELETE')
            @csrf
        
            <button type="submit" class="btn btn-danger btn-sm">Delete Project</button>
        </form>
    </div>
</div>