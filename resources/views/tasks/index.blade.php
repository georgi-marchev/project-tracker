@extends('layouts.app')

@section('content')

    <div class="container">
        @include('tasks._list', ['tasks' => $tasks, 'project' => $project])
    </div>

@endsection