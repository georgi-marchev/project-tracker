<?php

namespace App\Http\Requests\Task;

use App\Enums\TaskType;
use App\Enums\TaskStatus;
use App\Enums\TaskPriority;
use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Ensure the user is authorized to update the task (you can modify this as needed)
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => ['required', 'string', 'in:' . implode(',', array_map(fn($case) => $case->value, TaskType::cases()))],
            'status' => ['required', 'string', 'in:' . implode(',', array_map(fn($case) => $case->value, TaskStatus::cases()))],
            'priority' => ['required', 'string', 'in:' . implode(',', array_map(fn($case) => $case->value, TaskPriority::cases()))],
            'user_id' => 'nullable|exists:users,id',
        ];
    }
}
