<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\company;
class FrontController extends Controller
{
    public function home()
    {
        // return auth()->user()->role;
        $fields = Field::latest()->get();
        $companies = Company::latest()->get();
        return view('welcome', ['fields' => $fields, 'companies' => $companies]);
    }

    public function projects()
    {
        $projects = Project::with('skills')->get();

        return view('main.projects.index', ['projects' => $projects]);
    }



    public function freelance()
    {
        return view('main.freelance.index');
    }

    public function company()
    {
        $fields = Field::all();

        return view('main.company.index', ['fields' => $fields]);
    }

    public function index(Request $request)
{
    // بناء الاستعلام الأساسي
    $query = Project::withCount('proposals');

    // البحث بالنص
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        });
    }

    // البحث بالمهارات
    if ($request->filled('skill')) {
        $query->where('skills', 'like', '%"' . $request->skill . '"%');
    }


    // فلترة نطاق الميزانية
    if ($request->filled('budget_range')) {
        switch ($request->budget_range) {
            case '0-100':
                $query->where('budget_amount', '<', 100);
                break;
            case '100-500':
                $query->whereBetween('budget_amount', [100, 500]);
                break;
            case '500-1000':
                $query->whereBetween('budget_amount', [500, 1000]);
                break;
            case '1000+':
                $query->where('budget_amount', '>', 1000);
                break;
        }
    }

    // فلترة المدة
    if ($request->filled('duration')) {
        switch ($request->duration) {
            case 'short':
                $query->whereIn('duration', ['1-3', 'أقل من أسبوع']);
                break;
            case 'medium':
                $query->whereIn('duration', ['1-2', 'أسبوع - شهر']);
                break;
            case 'long':
                $query->whereIn('duration', ['2-4', '3-6', 'شهر - 3 أشهر']);
                break;
            case 'very_long':
                $query->whereIn('duration', ['4-8', 'أكثر من 3 أشهر']);
                break;
        }
    }

    // فلترة مستوى الخبرة
    if ($request->filled('experience')) {
        $query->where('experience_level', $request->experience);
    }

    // الترتيب والترقيم (بعد تطبيق جميع الفلاتر)
    $projects = $query->latest()->paginate(5)->withQueryString();

    // معالجة حقل skills بعد جلب البيانات
    $projects->getCollection()->transform(function ($project) {
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

    return view('main.projects.index', compact('projects'));
}
}
