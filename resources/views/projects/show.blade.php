@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        {{-- Project --}}
        <div class="d-flex justify-content-end">
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning me-3">Edit</a>
            @include('partials.delete.button', ['url' => route('projects.destroy', $project)])
            <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-primary ms-3">Create Task</a>
        </div>
        <div class="d-flex flex-column align-items-center justify-content-center text-center mt-3 mb-5">
            <h2>{{ $project->title }}</h2>
            <p>{{ $project->description ?? '' }}</p>
        </div>

        {{-- Task Filters --}}
        <form method="GET" action="{{ route('projects.show', $project) }}" class="mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row g-3 align-items-end">
                        <div class="col-lg-2 col-md-6">
                            <label for="filter-title" class="form-label small text-muted mb-1">Title</label>
                            <input type="text" id="filter-title" name="filters[like][title]"
                                class="form-control form-control-sm" placeholder="Task name"
                                value="{{ request()->input('filters.like.title', '') }}">
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label for="filter-type" class="form-label small text-muted mb-1">Type</label>
                            <select id="filter-type" name="filters[where][type]" class="form-select form-select-sm">
                                <option value="">All</option>
                                @foreach (\App\Enums\TaskType::cases() as $type)
                                    <option value="{{ $type->value }}"
                                        {{ request()->input('filters.where.type') === $type->value ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label for="filter-status" class="form-label small text-muted mb-1">Status</label>
                            <select id="filter-status" name="filters[where][status]" class="form-select form-select-sm">
                                <option value="">All</option>
                                @foreach (\App\Enums\TaskStatus::cases() as $status)
                                    <option value="{{ $status->value }}"
                                        {{ request()->input('filters.where.status') === $status->value ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label for="filter-priority" class="form-label small text-muted mb-1">Priority</label>
                            <select id="filter-priority" name="filters[where][priority]" class="form-select form-select-sm">
                                <option value="">All</option>
                                @foreach (\App\Enums\TaskPriority::cases() as $priority)
                                    <option value="{{ $priority->value }}"
                                        {{ request()->input('filters.where.priority') === $priority->value ? 'selected' : '' }}>
                                        {{ $priority->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <label for="filter-assignee" class="form-label small text-muted mb-1">Assignee</label>
                            <select id="filter-assignee" name="filters[where][user_id]" class="form-select form-select-sm">
                                <option value="">All</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ request()->input('filters.where.user_id') === (string) $user->id ? 'selected' : '' }}>
                                        {{ $user->email }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-2 col-md-12">
                            <div class="d-flex gap-2 flex-md-column flex-lg-row">
                                <button type="submit" class="btn btn-primary btn-sm flex-fill">
                                    <i class="bi bi-funnel me-1"></i>Filter
                                </button>
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-arrow-clockwise me-1"></i>Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        {{-- Task Pagination --}}
        @include('partials.pagination.size_selector', ['url' => route('projects.show', $project)])

        {{-- Tasks --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>@include('partials.sort.link', ['field' => 'title', 'label' => 'TITLE'])</th>
                    <th>@include('partials.sort.link', ['field' => 'created_at', 'label' => 'CREATED'])</th>
                    <th>@include('partials.sort.link', ['field' => 'type', 'label' => 'TYPE'])</th>
                    <th>@include('partials.sort.link', ['field' => 'status', 'label' => 'STATUS'])</th>
                    <th>@include('partials.sort.link', ['field' => 'priority', 'label' => 'PRIORITY'])</th>
                    <th>@include('partials.sort.link', ['field' => 'user_id', 'label' => 'USER'])</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td><span>{{ $task->title }}</span></td>
                        <td><span>{{ $task->created_at }}</span></td>
                        <td><span>{{ $task->type->name }}</span></td>
                        <td><span>{{ $task->status->name }}</span></td>
                        <td><span>{{ $task->priority->name }}</span></td>
                        <td><span>{{ $task->user?->email ?? '' }}</span></td>
                        <td>
                            <a href="{{ route('projects.tasks.show', [$project, $task]) }}"
                                class="btn btn-outline-dark mr-2">View</a>
                            <a href="{{ route('projects.tasks.edit', [$project, $task]) }}"
                                class="btn btn-warning mr-2">Edit</a>

                            @include('partials.delete.button', [
                                'url' => route('projects.tasks.destroy', [$project, $task]),
                            ])

                        </td>
                    </tr>
                @endforeach

                @include('partials.delete.confirmation_modal')
            </tbody>
        </table>

        {{-- Task Pagination Links --}}
        <div class="container">{{ $tasks->appends(request()->query())->links() }}</div>

    </div>
@endsection
