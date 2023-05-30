<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{

    
    public function index() {

        $projects = Project::with("Type", "Technologies", "leads")->paginate(6);

        return response()->json([
            "success" => true,
            "results" => $projects
        ]);
    }

    public function show(string $slug) {

        $project = Project::where("slug", $slug)->with("Type", "Technologies", "leads")->first();

        try {

            if($project) {

                return response()->json([
                    "success" => true,
                    "result" => $project
                ]);
            } else {
    
                return response()->json([
                    "success" => false,
                    "result" => null
                ], 404);
            }
        } catch (\Throwable $th) {
             
            return response()->json([
                "success" => false,
                "result" => null
            ], 500);
        }

    }
}


