<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();

        return response()->json([
            'success' => true,
            'results' => $technologies
        ]);
    }

    public function show(string $slug){
        $technology = Technology::where('slug', $slug)->with('projects')->first();

        return response()->json([
            'success' => true,
            'result' => $technology
        ]);

    }
}
