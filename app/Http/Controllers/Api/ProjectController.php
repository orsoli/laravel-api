<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    // Implemented index method
    public function index(){
        // Get all projects datas from db interacting with Project Model
        $projects = Project::all();
        // Return all datas projects in json format
        return response()->json([
            'success'=>true,
            'response'=>$projects,
        ]);
    }
}