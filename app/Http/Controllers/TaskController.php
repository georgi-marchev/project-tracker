<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Project;
use App\Http\Requests\Task\TaskStoreRequest;
use App\Http\Requests\Task\TaskUpdateRequest;

class TaskController extends Controller
{
    public function index(Project $project): View
    {
        $tasks = QueryHelper::queryTasks($project);

        return view('tasks.index', compact('project', 'tasks'));
    }

    public function create(Project $project): View
    {
        $users = User::all();
        return view('tasks.create', compact('project', 'users'));
    }

    public function store(TaskStoreRequest $request, Project $project): RedirectResponse
    {
        $taskData = array_merge($request->validated(), ['project_id' => $project->id]);

        Task::create(($taskData));

        return redirect()->route('projects.show', $project)
            ->with('success', 'Task created successfully.');
    }

    public function show(Project $project, Task $task): View
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Project $project, Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('project', 'task', 'users'));
    }

    public function update(TaskUpdateRequest $request, Project $project, Task $task): RedirectResponse
    {
        $taskData = array_merge($request->validated(), ['project_id' => $project->id]);

        $task->update($taskData);

        return redirect()->route('projects.show', $project)
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Project $project, Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('projects.show', $project)
            ->with('success', 'Task deleted successfully.');
    }
}
