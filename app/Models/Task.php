<?php

namespace App\Models;

use App\Enums\TaskType;
use App\Enums\TaskStatus;
use App\Enums\TaskPriority;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'type', 'status', 'priority', 'project_id', 'user_id'];

    protected $casts = [
        'type' => TaskType::class,
        'status' => TaskStatus::class,
        'priority' => TaskPriority::class,
    ];

    public function isCompleted(): bool
    {
        return $this->status === TaskStatus::Completed;
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
