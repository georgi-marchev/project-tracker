@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>All Projects</h2>
        @include('common.pagination.size_selector', ['url' => route('projects.index')])
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>
                        @include('common.sort.link', ['field' => 'title', 'label' => 'TITLE'])
                    </th>
                    <th>
                        @include('common.sort.link', ['field' => 'description', 'label' => 'DESCRIPTION'])
                    </th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></td>
                        <td><span>{{ \Illuminate\Support\Str::limit($project->description, 100) }}</span></td>
                        <td>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm mr-2">Edit</a>

                            @include('common.delete.button', ['url' => route('projects.destroy', $project)])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $projects->appends(request()->query())->links() }}
        </div>

    </div>
    <div class="container">
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create New Project</a>
    </div>
@endsection