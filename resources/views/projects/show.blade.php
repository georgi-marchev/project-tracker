@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="text-center">{{ $project->title }}</h2>
        <p class="text-center">{{ $project->description ?? '' }}</p>

        <h3>Tasks:</h3>

        @include('tasks.filters', ['url' => route('projects.show', $project)])
        @include('common.pagination.size_selector', ['url' => route('projects.show', $project)])
        @include('tasks.list', ['tasks' => $tasks, 'project' => $project])

        <!-- Pagination links -->
        {{ $tasks->appends(request()->query())->links() }}

        <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-primary mt-3">Add New Task</a>
    </div>

@endsection