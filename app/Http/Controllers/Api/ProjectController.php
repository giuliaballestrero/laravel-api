<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index () {

        //prendo tutti i post
        $projects = Project::with('type','technologies')->paginate(15);

        //la risposta mi restituisce tutti i projects in formato json
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show (Project $project) { //uso la dependency injection

        //findorfail sull'id del progetto da mostrare
        $project = Project::with('type','technologies')->findOrFail($project->id);

        //la risposta mi restituisce il project da visualizzare in formato json
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }
}
