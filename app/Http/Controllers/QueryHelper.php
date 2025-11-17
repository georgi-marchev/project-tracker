<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryHelper
{
    const ALLOWED_TASKS_FILTERS = [
        'title',
        'type',
        'status',
        'priority',
    ];

    public static function queryTasks(Project $project): LengthAwarePaginator
    {
        $request = request();

        // Initialize the query builder
        $query = $project->tasks();

        $filters = $request->get('filters', []);

        if (isset($filters['where'])) {
            foreach ($filters['where'] as $column => $value) {
                if ($value !== null && in_array($column, self::ALLOWED_TASKS_FILTERS)) {
                    $query->where($column, $value);
                }
            }
        }

        if (isset($filters['like'])) {
            foreach ($filters['like'] as $column => $value) {
                if ($value !== null && in_array($column, self::ALLOWED_TASKS_FILTERS)) {
                    $query->where($column, 'like', "%$value%");
                }
            }
        }

        // Sort and paginate
        $sortBy = $request->get('sort_by', 'title');
        $order = $request->get('order', 'asc');
        $perPage = $request->get('per_page', 10);
        $tasks = $query
            ->orderBy($sortBy, $order)
            ->paginate($perPage);

        return $tasks;
    }
}