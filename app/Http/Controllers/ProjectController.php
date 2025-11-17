<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proposals;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //return view('admin.projects.index', compact('projects'));
    public function index()
    {
        $projects = Project::withCount('proposals')->paginate(15);

        // قم بتحويل كل project manually
        $projects->transform(function ($project) {
            // معالجة حقل skills
            if (is_string($project->skills)) {
                $skillsArray = json_decode($project->skills, true);
                if (is_array($skillsArray)) {
                    $decodedSkills = [];
                    foreach ($skillsArray as $skill) {
                        // فك تشفير Unicode escape sequences
                        $decodedSkill = json_decode('"' . $skill . '"');
                        $decodedSkills[] = $decodedSkill;
                    }
                    $project->skills = $decodedSkills;
                }
            }
            return $project;
        });

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('main.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
   // return $request->all();
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'budget_amount' => 'required|numeric',
        'duration' => 'required|string',
        'attachments' => 'nullable|array',
        'attachments.*' => 'nullable|file|max:10240', // 10MB
        'skills' => 'nullable|array'
    ]);

    $project = new Project();
    $project->user_id = auth()->id() ?? 1;
    $project->title = $request->title;
    $project->description = $request->description;
    $project->budget_amount = $request->budget_amount;
    $project->duration = $request->duration;
    $project->status = 'draft';
    $project->skills = json_encode($request->skills ?? []);
    $project->attachments = null; // Initialize
    //return $request->all();
    // Handle attachments
    if ($request->hasFile('attachments')) {
        $attachmentsPaths = [];
        $uploadPath = public_path('uploads/projects');
        // Ensure the directory exists
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        foreach ($request->file('attachments') as $file) {
            $fileName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
            // Move the file to the public directory
            $file->move($uploadPath, $fileName);
            // Save the path relative to public, so we can use it in the frontend
            $attachmentsPaths[] = 'uploads/projects/' . $fileName;
        }

        $project->attachments = json_encode($attachmentsPaths);
    }

    $project->save();

    return redirect()->route('project.create', $project)->with('status', 'تم إنشاء المشروع ويتطلب مراجعة من قبل الإدارة!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
       //return $project;
        $project->skills = json_decode($project->skills, true);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $project = Project::findOrFail($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->budget_amount = $request->input('budget_amount');
        $project->duration = $request->input('duration');
        $project->skills = json_encode($request->input('skills', []));
        $project->status = $request->input('status');
        // قم بتحديث الحقول الأخرى حسب الحاجة
        $project->update();

        return redirect()->route('projects.index')->with('status', 'تم تحديث المشروع بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'تم حذف المشروع بنجاح!');
    }
}
