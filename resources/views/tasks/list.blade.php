<table class="table table-striped">
    <thead>
        <tr>
            <th>@include('common.sort.link', ['field' => 'title', 'label' => 'TITLE'])</th>
            <th>@include('common.sort.link', ['field' => 'created_at', 'label' => 'CREATED'])</th>
            <th>@include('common.sort.link', ['field' => 'type', 'label' => 'TYPE'])</th>
            <th>@include('common.sort.link', ['field' => 'status', 'label' => 'STATUS'])</th>
            <th>@include('common.sort.link', ['field' => 'priority', 'label' => 'PRIORITY'])</th>
            <th>ACTIONS</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td><a href="{{ route('projects.tasks.show', [$project, $task]) }}">{{ $task->title }}</a></td>
                <td><span>{{ $task->created_at }}</span></td>
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