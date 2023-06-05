<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {

        $projects = Project::all();

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);

    }


    //funzione per la visualizzazione del singolo elemento
    public function show($slug) {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        if($project) {

            return response()->json([
                'success' => true,
                'project' => $project,
            ]);

        } else {

            return response()->json([
                'success' => false,
                'error' => 'Selected project does not exist',
            ]);

        }

    }
}
