@extends('layouts.app')

@section('content')
    <h2 class="text-center">Edit Project</h2>
    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project-title">Project Title</label>
            <input type="text" name="title" id="project-title" class="form-control" value="{{ $project->title }}" required>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="project-description">Description</label>
            <textarea name="description" id="project-description" class="form-control">{{ $project->description }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex justify-content-end mt-3">
            <a href="#" id="back-button" class="btn btn-secondary me-2">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Project</button>
        </div>
    </form>

    @push('scripts')
        <script src="{{ asset('js/back-button.js') }}"></script>
    @endpush
@endsection
