@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Edit Project</h2>
        <form action="{{ route('projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="project-title">Project Title</label>
                <input type="text" name="title" id="project-title" class="form-control" value="{{ $project->title }}"
                    required>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project-description">Description</label>
                <textarea name="description" id="project-description"
                    class="form-control">{{ $project->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update Project</button>
        </form>
    </div>

@endsection