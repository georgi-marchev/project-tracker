@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create New Task for Project: {{ $project->title }}</h2>

        <form action="{{ route('projects.tasks.store', $project) }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="task-title">Task Title</label>
                <input type="text" name="title" id="task-title" value="{{ old('title') }}" class="form-control" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="task-description">Task Description</label>
                <textarea name="description" id="task-description" class="form-control" rows="4"
                    required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="task-type">Task Type</label>
                <select name="type" id="task-type" class="form-select" required>
                    @foreach(\App\Enums\TaskType::cases() as $type)
                        <option value="{{ $type->value }}" {{ old('type') === $type->value ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="task-priority">Task Priority</label>
                <select name="priority" id="task-priority" class="form-select" required>
                    @foreach(\App\Enums\TaskPriority::cases() as $priority)
                        <option value="{{ $priority->value }}" {{ old('priority') === $priority->value ? 'selected' : '' }}>
                            {{ $priority->name }}
                        </option>
                    @endforeach
                </select>
                @error('priority')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="task-user-id">Assigned User</label>
                <select name="user_id" id="task-user-id" class="form-select" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->email }}
                        </option>
                    @endforeach
                </select>
                @error('priority')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Task</button>
        </form>

        <a href="{{ route('projects.show', $project) }}" class="btn btn-secondary mt-3">Back to Project</a>
    </div>

@endsection