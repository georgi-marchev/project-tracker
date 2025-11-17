<!-- Filter form for tasks -->
<form method="GET" action="{{ $url }}" class="mb-4">
    <div class="row">
        <!-- Title filter -->
        <div class="col-md-3">
            <input type="text" name="filters[like][title]" class="form-control" placeholder="Filter by title"
                value="{{ request()->input('filters.like.title', '') }}">
        </div>

        <!-- Type filter -->
        <div class="col-md-3">
            <select name="filters[where][type]" class="form-control">
                <option value="">Filter by type</option>
                @foreach(\App\Enums\TaskType::cases() as $type)
                    <option value="{{ $type->value }}" {{ request()->input('filters.where.type') === $type->value ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status filter -->
        <div class="col-md-3">
            <select name="filters[where][status]" class="form-control">
                <option value="">Filter by status</option>
                @foreach(\App\Enums\TaskStatus::cases() as $status)
                    <option value="{{ $status->value }}" {{ request()->input('filters.where.status') === $status->value ? 'selected' : '' }}>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Priority filter -->
        <div class="col-md-3">
            <select name="filters[where][priority]" class="form-control">
                <option value="">Filter by priority</option>
                @foreach(\App\Enums\TaskPriority::cases() as $priority)
                    <option value="{{ $priority->value }}" {{ request()->input('filters.where.priority') === $priority->value ? 'selected' : '' }}>
                        {{ $priority->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 mt-2 text-end">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>