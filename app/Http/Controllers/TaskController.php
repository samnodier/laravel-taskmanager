<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the task.
     */
    public function index(Request $request)
    {
        $projectId = $request->input('project_id');
        $projects = Project::all();

        if ($projectId) {
            $tasks = Task::where('project_id', $projectId)->orderBy('priority')->get();
        } else {
            $tasks = Task::orderBy('priority')->get();
        }

        return view('tasks.index', compact('tasks', 'projects', 'projectId'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:250',
            'project_id' => 'required'
        ]);
        $task = new Task();
        $task->name = $validated['name'];
        $task->priority = Task::max('priority') + 1;
        $task->project_id = $validated['project_id'];
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        $projects = Project::all();
        return view('tasks.edit', compact('projects', 'task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|max:250',
            'project_id' => 'required'
        ]);

        $task->name = $validated['name'];
        $task->project_id = $validated['project_id'];
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        $deletedPriority = $task->priority;
        $task->delete();

        $remainingTasks = Task::orderBy('priority')->get();
        $priority = 1;
        foreach ($remainingTasks as $remainingTask) {
            $remainingTask->priority = $priority;
            $remainingTask->save();
            $priority++;
        }

        return redirect()->route('tasks.index');
    }

    /**
     * Reorder tasks
     */

    public function reorder(Request $request)
    {
        $tasksOrder = $request->input('tasks');
        $priority = 1;

        // Update the priority of the task
        foreach ($tasksOrder as $taskId) {
            Task::where('id', $taskId)->update(['priority' => $priority]);
            $priority++;
        }

        $resultsHtml = '';

        // Get the new tasks ordered by priority
        $tasks = Task::orderBy('priority')->get();
        foreach ($tasks as $task) {
            // Create a task
            $taskHtml = view('components.task', ['task' => $task])->render();
            // Append it to the reults
            $resultsHtml .= $taskHtml;
        }

        // Return the results
        return response()->json(['message' => 'Tasks reorder successfully', 'html' => $resultsHtml]);
    }
}
