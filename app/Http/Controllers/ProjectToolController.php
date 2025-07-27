<?php

namespace App\Http\Controllers;

use App\Models\ProjectTool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tool;
use App\Models\Project;

class ProjectToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('project-tools.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        $tools = Tool::orderBy('id', 'desc')->get();
        return view('admin.project_tools.create', [
            'tools' => $tools,
            'project' => $project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'tool_id' => 'required|integer',
        ]);

        DB::beginTransaction();

        try {
            $validated['project_id'] = $project->id;

            $assignedTool = ProjectTool::updateOrCreate($validated);

            DB::commit();

            return redirect()->back()->with('success', 'Tool created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('error', 'Failed to create tool: ', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectTool $projectTool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectTool $projectTool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectTool $projectTool, Project $project)
    {
        DB::beginTransaction();

        try {
            $projectTool->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Tool removed successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('error', 'Failed to remove tool: ', $e->getMessage());
        }
    }
}
