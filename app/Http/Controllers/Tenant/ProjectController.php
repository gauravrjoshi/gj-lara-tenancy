<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('tenant.project.index',['projects',Project::all()]);
    }

    public function store(Request $request)
    {
        $project = Project::create($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        return $project;
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]));

        return response()->json($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->noContent();
    }
}
