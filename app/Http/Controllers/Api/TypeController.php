<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Type;

class TypeController extends Controller
{
    // Implemented index method
    public function index(){
        // Get all types datas from db interacting with Type Model
        $types = Type::all();
        // Return all datas types in json format
        return response()->json([
            'success'=>true,
            'results'=>$types,
        ]);
    }
}