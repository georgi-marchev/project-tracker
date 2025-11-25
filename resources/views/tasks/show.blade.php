@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('projects.tasks.edit', [$task->project, $task]) }}" class="btn btn-warning me-3">Edit</a>
            @include('common.delete.button', ['url' => route('projects.tasks.destroy', [$task->project, $task])])
        </div>

        <h2 class="text-center fw-bold mb-1">{{ $task->title }}</h2>

        <div class="text-center mb-4">
            <h5><a href="{{ route('projects.show', $task->project) }}" class="text-decoration-none text-primary">
                    {{ $task->project->title }}</h3>
                </a>
        </div>

        @if($task->description)
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <p class="mb-0">{{ $task->description }}</p>
                </div>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <th class="w-25">Type</th>
                            <td>{{ $task->type->name }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $task->status->name }}</td>
                        </tr>
                        <tr>
                            <th>Priority</th>
                            <td>{{ $task->priority->name }}</td>
                        </tr>
                        <tr>
                            <th>Assigned to</th>
                            <td>{{ $task->user->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('common.delete.confirmation_modal')
@endsection