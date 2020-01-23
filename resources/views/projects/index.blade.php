@extends('layouts.app')
@section('content')
    <main class="projects">
        <div class="d-flex justify-content-between mb-3 projects__header">
            <p>My Projects</p>
            <a href="/projects/create" class="btn btn-primary">New Project</a>
        </div>
    
        <div class="mb-3 projects__wrapper">
            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card shadow-sm projects__card">
                            <div class="card-header">
                                <h4 class="my-0 projects__title">
                                    <a href="{{ $project->path() }}">{{ $project->title }}</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                {{ Str::limit($project->description, 200) }}
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No projects</p>
                @endforelse
            </div>
        </div>
    </main>
@endsection