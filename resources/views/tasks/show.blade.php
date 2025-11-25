@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-end">
            <a href="{{ route('projects.tasks.edit', [$task->project, $task]) }}" class="btn btn-warning me-3">Edit</a>
            @include('common.delete.button', ['url' => route('projects.tasks.destroy', [$task->project, $task])])
        </div>
        <div class=text-center mt-3 mb-5">
            <h2>
                <a href="{{ route('projects.show', $task->project) }}"
                    class="text-decoration-none text-primary">{{ $task->project->title }}</a>
            </h2>
        </div>

        <div class="mb-4">
            <strong>Description:</strong>
            <p>{{ $task->description ?? 'No description available' }}</p>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Type:</strong>
                <p>{{ $task->type->name }}</p>
            </div>
            <div class="col-md-6">
                <strong>Status:</strong>
                <p>{{ $task->status->name }}</p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Priority:</strong>
                <p>{{ $task->priority->name }}</p>
            </div>
            <div class="col-md-6">
                <strong>Assigned to:</strong>
                <p>{{ $task->user->email }}</p>
            </div>
        </div>
    </div>

    @include('common.delete.confirmation_modal')
@endsection