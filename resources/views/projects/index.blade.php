@extends('layouts.app')

@section('content')

    <div class="container mt-5">

        <div class="d-flex justify-content-end">
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center text-center mt-3 mb-5">
            <h2>Projects</h2>
        </div>

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
                        <td>{{ $project->title }}</td>
                        <td><span>{{ \Illuminate\Support\Str::limit($project->description, 100) }}</span></td>
                        <td>
                            <a href="{{ route('projects.show', [$project]) }}" class="btn btn-outline-dark mr-2">View</a>
                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning mr-2">Edit</a>
                            @include('common.delete.button', ['url' => route('projects.destroy', $project)])
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $projects->appends(request()->query())->links() }}
        @include('common.delete.confirmation_modal')

    </div>
@endsection