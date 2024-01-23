<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $project = new Project();
        $project->fill($form_data);
        $project->slug = Str::slug($project->title, '-');
        $project->save();

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $project = Project::where('slug', $project->slug)->first();
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $form_data = $request->all();
        $project_to_update = Project::where('slug', $project->slug)->first();
        $project_to_update->update($form_data);
        return redirect()->route('admin.projects.show', ['project' => $project_to_update->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project = Project::where('slug', $project->slug)->first();
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Il progetto "' . $project->title .'" è stato rimosso');
    }
}
