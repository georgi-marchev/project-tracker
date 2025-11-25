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
            <div class="d-flex justify-content-end mt-3">
                <a href="#" id="back-button" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Project</button>
            </div>

        </form>
    </div>

    @push('scripts')
        <script src="{{ asset('js/back-button.js') }}"></script>
    @endpush

@endsection