<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the task.
     */
    public function index()
    {
        $tasks = Task::orderBy('priority')->get();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required:max:250',
        ]);
        $task = new Task();
        $task->name = $validated['name'];
        $task->priority = Task::max('priority') + 1;
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified task.
     */
    public function show(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|max:250'
        ]);

        $task->name = $validated['name'];
        $task->save();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

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
