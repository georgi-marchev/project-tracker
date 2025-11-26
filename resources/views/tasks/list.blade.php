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
                    <a href="{{ route('projects.tasks.edit', [$project, $task]) }}" class="btn btn-warning mr-2">Edit</a>

                    @include('partials.delete.button', ['url' => route('projects.tasks.destroy', [$project, $task])])

                </td>
            </tr>
        @endforeach

        @include('partials.delete.confirmation_modal')
    </tbody>
</table>