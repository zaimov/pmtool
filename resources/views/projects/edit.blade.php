@extends('layouts.app')
@section('content')
<h1>Edit your project</h1>
<form method="POST" action="{{ $project->path() }}">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title"
            value="{{ $project->title }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30"
            rows="10" required>{{ $project->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update project</button>
    <a href="{{ $project->path() }}">Cancel</a>

    @include('projects.errors')
</form>
@endsection