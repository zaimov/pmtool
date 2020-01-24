@extends('layouts.app')
@section('content')
    <main class="project global">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between mb-3">
                    <p>
                        <a href="/projects">My Projects</a> / {{ $project->title }}
                    </p>
                    <a href="/projects/create" class="btn btn-primary">New Project</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="project__tasks-wrapper mb-3">
                    <h2 class="mb-3">Tasks</h2>
                    <div class="project__task card mb-2 p-2">
                        Task 1
                    </div>
                    <div class="project__task card mb-2 p-2">
                        Task 2
                    </div>
                    <div class="project__task card mb-2 p-2">
                        Task 3
                    </div>
                </div>

                <div class="gnotes mb-3">
                    <h2 class="mb-3">General notes</h2>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Lorem ipsum</textarea>
                    </div>
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