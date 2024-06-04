<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // $project = Project::all();
        //$project = Project::with('technology')->paginate(10);

        $project = Project::with('technology', 'types')->paginate(15);
        // $project = Project::with('technology', 'types')->get();

        // $success = true;

        return response()->json($project);
    }

    public function getTechnologies()
    {
        $technologies = Technology::all();
        return response()->json($technologies);
    }

    public function getTypes()
    {
        $types = Type::all();
        return response()->json($types);
    }
}
