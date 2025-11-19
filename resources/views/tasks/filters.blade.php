<form method="GET" action="{{ $url }}" class="mb-4">
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
                        @foreach(\App\Enums\TaskType::cases() as $type)
                            <option value="{{ $type->value }}" {{ request()->input('filters.where.type') === $type->value ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-md-6">
                    <label for="filter-status" class="form-label small text-muted mb-1">Status</label>
                    <select id="filter-status" name="filters[where][status]" class="form-select form-select-sm">
                        <option value="">All</option>
                        @foreach(\App\Enums\TaskStatus::cases() as $status)
                            <option value="{{ $status->value }}" {{ request()->input('filters.where.status') === $status->value ? 'selected' : '' }}>
                                {{ $status->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-md-6">
                    <label for="filter-priority" class="form-label small text-muted mb-1">Priority</label>
                    <select id="filter-priority" name="filters[where][priority]" class="form-select form-select-sm">
                        <option value="">All</option>
                        @foreach(\App\Enums\TaskPriority::cases() as $priority)
                            <option value="{{ $priority->value }}" {{ request()->input('filters.where.priority') === $priority->value ? 'selected' : '' }}>
                                {{ $priority->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2 col-md-6">
                    <label for="filter-assignee" class="form-label small text-muted mb-1">Assignee</label>
                    <select id="filter-assignee" name="filters[where][user_id]" class="form-select form-select-sm">
                        <option value="">All</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ request()->input('filters.where.user_id') === (string) $user->id ? 'selected' : '' }}>
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
                        <a href="{{ $url }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-clockwise me-1"></i>Reset
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>