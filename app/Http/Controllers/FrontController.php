<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\Project;
class FrontController extends Controller
{
    public function home()
    {
        $fields = Field::latest()->get();
        return view('welcome', ['fields' => $fields]);
    }

    public function projects()
    {
        $projects = Project::with('skills')->get();
        return view('main.projects.index', ['projects' => $projects]);
    }

    public function freelance(){
        return view('main.freelance.index');
    }

    public function index()
    {
        //$projects = auth()->user()->projects()->withCount('proposals')->get();
        $projects = Project::withCount('proposals')->get();
        return view('main.projects.index', compact('projects'));
    }
}
