@extends('layouts.app')

@section('content')

    <div class="container">
        @include('common.pagination.size_selector', ['url' => route('projects.show', $project)])
        @include('tasks._list', ['tasks' => $tasks, 'project' => $project])
        <!-- Pagination links -->
        {{ $tasks->appends(request()->query())->links() }}
    </div>

@endsection