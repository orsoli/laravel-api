<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\CreateUpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');// Each methods of this controller throw before from moddleware auth.
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUpdateProjectRequest $request)
    {
        $formDatas = $request->validated();

        // Check if in request is a valid value for image_url
        if($request->hasFile('image_url')){
            $filepath = Storage::put('img/projects/', $request->image_url); // Save the url of image inputed
            $formDatas['image_url'] = $filepath; //Rewrite the value f image_url in $formdata
        }

        $newProject = Project::create($formDatas);


        if(isset($formDatas['technologies'])){
            $newProject->technologies()->sync($formDatas['technologies']);
        }else{
            $newProject->technologies()->detach();
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUpdateProjectRequest $request, Project $project)
    {
        $formDatas = $request->validated();

        if($request->hasFile('image_url')){
            $filepath = Storage::put('img/projects', $request->image_url);
            $formDatas['image_url'] = $filepath;
        }

        $project->update($formDatas);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
