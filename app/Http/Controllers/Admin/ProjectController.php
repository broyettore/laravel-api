<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

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

        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.create', compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $newProject = new Project();
        $newProject->fill($data);

        $newProject->slug = Str::slug($data["name"]);
        if(isset($data["image"])) {
            $newProject->image = Storage::put("uploads", $data["image"]);
        }
        
        $newProject->save();

        if(isset($data['technologies'])){ 
            $newProject->technologies()->sync($data['technologies']);
        }

        return to_route("admin.projects.show", $newProject->id)->with("message", "Project created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.project.edit', compact('project', "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        
        $project->slug = Str::slug($data["name"]);

            if (isset($data['image'])) {

                if($project->image){
                    Storage::delete($project->image);
                }

                $project->image = Storage::put('uploads', $data['image']);
            }

        $technologies = isset($data['technologies']) ? $data['technologies'] : [];
        $project->technologies()->sync($technologies);

        $project->update($data);

        return  to_route("admin.projects.index")->with('message', "Project $project->id updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $old_id = $project->id;

        if($project->image){
            Storage::delete($project->image);
        }
        
        $project->delete();
        return  to_route("admin.projects.index")->with('message', "Project $old_id cancelled successfully");
    }
}
