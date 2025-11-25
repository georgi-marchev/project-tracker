@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-end  mt-5">
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning me-3">Edit</a>
            @include('common.delete.button', ['url' => route('projects.destroy', $project)])
            <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-primary ms-3">Create Task</a>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center text-center mt-3 mb-5">
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->description ?? '' }}</p>
        </div>

        @include('tasks.filters', ['url' => route('projects.show', $project), 'users' => $users])
        @include('common.pagination.size_selector', ['url' => route('projects.show', $project)])
        @include('tasks.list', ['tasks' => $tasks, 'project' => $project])

        {{ $tasks->appends(request()->query())->links() }}
    </div>

@endsection