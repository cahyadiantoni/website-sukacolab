<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Exception;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project = Project::orderBy('name', 'asc')->get();

        return view('project.project', [
            'project' => $project
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.project-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:projects',
            'name_project' => 'required',
            'location' => 'required',
            'tipe' => 'required',
            'salary' => 'required',
            'working_time' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);

        $project = Project::create($request->all());

        Alert::success('Success', 'Project has been saved !');
        return redirect('/project');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project = project::findOrFail($id);

        return view('project.project-edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:100|unique:projects,name,' . $id . ',id',
            'name_project' => 'required',
            'location' => 'required',
            'tipe' => 'required',
            'salary' => 'required',
            'working_time' => 'required',
            'description' => 'required',
            'requirements' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validated);

        Alert::info('Success', 'Project has been updated !');
        return redirect('/project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $deletedproject = Project::findOrFail($id);

            $deletedproject->delete();

            Alert::error('Success', 'Project has been deleted !');
            return redirect('/project');
        } catch (Exception $ex) {
            Alert::warning('Error', 'Cant deleted, Project already used !');
            return redirect('/project');
        }
    }
}
