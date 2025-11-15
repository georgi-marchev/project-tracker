@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="mb-4">
            <strong>Project:</strong>
            <a href="{{ route('projects.show', $task->project) }}">{{ $task->project->title }}</a>
        </div>

        <h2>{{ $task->title }}</h2>

        <div class="mb-4">
            <strong>Description:</strong>
            <p>{{ $task->description ?? 'No description available' }}</p>
        </div>

        <div class="mb-4">
            <strong>Status:</strong>
            <p>{{ $task->completed ? 'Completed' : 'Incomplete' }}</p>
        </div>

        <div>
            <a href="{{ route('projects.tasks.edit', [$task->project, $task]) }}" class="btn btn-warning btn-sm">Edit
                Task</a>
            <form action="{{ route('projects.tasks.destroy', [$task->project, $task]) }}" method="POST"
                style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete Task</button>
            </form>
        </div>
    </div>

@endsection