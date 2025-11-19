@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create New Project</h2>
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="project-title">Project Title</label>
                <input type="text" name="title" id="project-title" class="form-control" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project-description">Description</label>
                <textarea name="description" id="project-description" class="form-control"></textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Project</button>
        </form>
    </div>

@endsection