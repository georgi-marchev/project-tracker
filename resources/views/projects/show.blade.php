@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>{{ $project->title ?? 'No title' }}</h2>
        <p>{{ $project->description ?? 'No description' }}</p>

        <h3>Tasks:</h3>

        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-primary mt-3">Add New Task</a>
    </div>

@endsection