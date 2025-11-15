@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>All Projects</h2>
        <div class="list-group">
            @foreach ($projects as $project)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('projects.show', $project) }}" class="h5">{{ $project->title }}</a>
                    <div>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
    </div>

@endsection