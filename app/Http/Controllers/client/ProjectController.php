<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy("id", "DESC")->paginate(9);
        return view('client.project.index', ["projects" => $projects]);
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('client.project.show', ["project" => $project]);
    }
}
