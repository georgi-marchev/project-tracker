@extends('layouts.app')

@section('content')

    <div class="container">
        @include('tasks.filters', ['url' => route('projects.tasks.index', $project)])
        @include('common.pagination.size_selector', ['url' => route('projects.show', $project)])
        @include('tasks.list', ['tasks' => $tasks, 'project' => $project])
        <!-- Pagination links -->
        {{ $tasks->appends(request()->query())->links() }}
    </div>
@endsection