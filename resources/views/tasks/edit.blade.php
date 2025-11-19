@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Project: <a href="{{ route('projects.show', $task->project) }}">{{ $task->project->title }}</a>
        </h2>

        <form action="{{ route('projects.tasks.update', [$project, $task]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task-title">Task Title</label>
                <input type="text" name="title" id="task-title" value="{{ old('title', $task->title) }}"
                    class="form-control" required>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="task-description">Task Description</label>
                <textarea name="description" id="task-description" class="form-control" rows="4"
                    required>{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Type Selection -->
            <div class="form-group">
                <label for="task-type">Task Type</label>
                <select name="type" id="task-type" class="form-control">
                    @foreach(\App\Enums\TaskType::cases() as $type)
                        <option value="{{ $type->value }}" 
                            {{ old('type', $task->type->value) === $type->value ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Selection -->
            <div class="form-group">
                <label for="task-status">Task Status</label>
                <select name="status" id="task-status" class="form-control">
                    @foreach(\App\Enums\TaskStatus::cases() as $status)
                        <option value="{{ $status->value }}" 
                            {{ old('status', $task->status->value) === $status->value ? 'selected' : '' }}>
                            {{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Priority Selection -->
            <div class="form-group">
                <label for="task-priority">Task Priority</label>
                <select name="priority" id="task-priority" class="form-control">
                    @foreach(\App\Enums\TaskPriority::cases() as $priority)
                        <option value="{{ $priority->value }}" 
                            {{ old('priority', $task->priority->value) === $priority->value ? 'selected' : '' }}>
                            {{ $priority->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="task-user-id">Assigned User</label>
                <select name="user_id" id="task-user-id" class="form-control">
                    <option value="">Unassigned</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->email }}
                         </option>
                    @endforeach
                </select>
                @error('priority')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Task</button>
        </form>
    </div>

@endsection