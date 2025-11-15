<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskPriority;
use App\Enums\TaskType;
use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => ['required', 'string', 'in:' . implode(',', array_map(fn($case) => $case->value, TaskType::cases()))],
            'priority' => ['required', 'string', 'in:' . implode(',', array_map(fn($case) => $case->value, TaskPriority::cases()))],
        ];
    }
}
