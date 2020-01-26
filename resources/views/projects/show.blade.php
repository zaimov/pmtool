@extends('layouts.app')
@section('content')
<main class="project global">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between mb-3">
                <p>
                    <a href="/projects">My Projects</a> / {{ $project->title }}
                </p>
                <a href="{{ $project->path() . '/edit' }}" class="btn btn-primary">Edit Project</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="project__tasks-wrapper mb-3">
                <h2 class="mb-3">Tasks</h2>
                @foreach ($project->tasks as $task)
                <form class="form-inline" action="{{ $task->path() }}" method="POST">
                    @method('PATCH')
                    @csrf

                    <input type="text" name="body"
                        class="form-control col-md-10 mb-2 mr-sm-2 {{ $task->completed ? 'text-muted' : ''}}"
                        value=" {{ $task->body }}">

                    <div class="form-check">
                        <input class="form-check-input" name="completed" id="completed" type="checkbox"
                            onchange="this.form.submit()" {{ $task->completed ? 'checked' : ''}}>
                        <label class="form-check-label">{{ $task->completed ? 'Completed' : 'Not complete'}}</label>
                    </div>
                </form>
                @endforeach
                <form action="{{ $project->path() . '/tasks' }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Add tasks" name="body">
                    </div>
                </form>
            </div>

            <div class="gnotes mb-3">
                <h2 class="mb-3">General notes</h2>
                <div class="form-group">
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <textarea class="form-control mb-3" name="notes" id="notes"
                            rows="3">{{ $project->notes }}</textarea>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                @include('projects.errors')
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm global__card">
                <div class="card-header">
                    <h4 class="my-0 projects__title">
                        <h4>{{ $project->title }}</h4>
                    </h4>
                </div>
                <div class="card-body">
                    {{ Str::limit($project->description, 200) }}
                </div>
            </div>
        </div>
    </div>

</main>
@endsection