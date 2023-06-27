<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:25',
        ]);
        $project = new Project();
        $project->name = $validated['name'];
        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|max:25'
        ]);

        $project->name = $validated['name'];
        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
