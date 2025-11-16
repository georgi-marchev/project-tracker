<table class="table table-striped">
    <thead>
        <tr>
            <th>TASK</th>
            <th>TYPE</th>
            <th>STATUS</th>
            <th>PRIORITY</th>
            <th>ACTIONS</th>
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

                    @include('common.delete.button', ['url' => route('projects.tasks.destroy', [$project, $task])])

                </td>
            </tr>
        @endforeach

        @include('common.delete.confirmation_modal')
    </tbody>
</table>