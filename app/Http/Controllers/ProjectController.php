<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proposals;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //return view('admin.projects.index', compact('projects'));
    public function index()
{
    $projects = Project::withCount('proposals')->get();

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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'budget_type' => 'required|in:fixed,hourly',
            'budget_amount' => 'required_if:budget_type,fixed|numeric|min:0',
            'hourly_rate' => 'required_if:budget_type,hourly|numeric|min:0',
            'weekly_hours' => 'required_if:budget_type,hourly|string',
            'project_duration' => 'required|string',
            'experience_level' => 'required|in:beginner,intermediate,expert',
            'skills' => 'array', // إذا كنا نستخدم مهارات كمصفوفة
            'file_attachments' => 'nullable|array',
        ]);

        return $request;

        // إنشاء المشروع
        $project = Project::create($validated);

        // إذا كان لدينا مهارات، نربطها
        if ($request->has('skills')) {
            $project->skills()->attach($request->skills);
        }

        // معالجة المرفقات إذا وجدت

        return redirect()->route('projects.show', $project)->with('status', 'تم إنشاء المشروع ويتطلب مراجعة من قبل الإدارة!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
