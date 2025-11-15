<table class="table table-striped">
    <thead>
        <tr>
            <th>Task</th>
            <th>Type</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td><a href="{{ route('projects.tasks.show', [$project, $task]) }}">{{ $task->title }}</a></td>
                <td><span>{{ $task->type->name }}</span></td>
                <td><span>{{ $task->status->name }}</span></td>
                <td><span>{{ $task->priority->name }}</span></td>
                <td>
                    <a href="{{ route('projects.tasks.edit', [$project, $task]) }}"
                        class="btn btn-warning btn-sm mr-2">Edit</a>
                    <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>