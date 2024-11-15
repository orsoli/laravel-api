<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;

class TechnologyController extends Controller
{
    // Implemented index method
    public function index(){
        // Get all technologies datas from db interacting with technology Model
        $technologies = Technology::all();
        // Return all datas technologies in json format
        return response()->json([
            'success'=>true,
            'results'=>$technologies,
        ]);
    }
}