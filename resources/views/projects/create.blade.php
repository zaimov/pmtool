@extends('layouts.app')
@section('content')
    <h1>PMTool create a project</h1>
    <form method="POST" action="/projects">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create project</button>
        <a href="/projects">Cancel</a>
    </form>
@endsection