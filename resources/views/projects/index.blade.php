@extends('layouts.app')
@section('content')
    <main class="projects global">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between mb-3">
                    <h2>My Projects</h2>
                    <a href="/projects/create" class="btn btn-primary">New Project</a>
                </div>
            </div>
        </div>
    
        <section class="mb-3 projects__wrapper">
            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-md-6 col-lg-4 mb-4">
                        @include('projects.description')
                    </div>
                @empty
                    <p>No projects</p>
                @endforelse
            </div>
        </section>
    </main>
@endsection