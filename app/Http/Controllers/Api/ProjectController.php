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

    public function getProjectBySlug($slug)
    {
        $project = Project::where('slug', $slug)->with('technology', 'types')->first();
        if ($project) {
            $success = true;
            if ($project->image) {
                $project->image = asset('storage/' . $project->image);
            } else {
                $project->image = asset('storage/upload/placeholder.png');
            }
        } else {
            $success = false;
        }
        return response()->json(compact('success', 'project'));
    }
}
