<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Freelancer;
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
        $freelancers = Freelancer::with('skills')->get();
        //return auth()->user();
        return view('main.freelance.index', ['freelancers' => $freelancers]);
    }

    public function company()
    {
        $fields = Field::all();

        return view('main.company.index', ['fields' => $fields]);
    }

    public function index(Request $request)
    {
        // بناء الاستعلام الأساسي مع علاقة المهارات
        $query = Project::with(['user']);
        //return $query;
        // البحث بالنص
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        // البحث بالمهارات - استخدام العلاقة الصحيحة
        if ($request->filled('skill')) {
            $query->whereHas('skills', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->skill . '%');
            });
        }

        // فلترة نطاق الميزانية
        if ($request->filled('budget_range')) {
            switch ($request->budget_range) {
                case '0-25000':
                    $query->where('budget_amount', '<', 25000);
                    break;
                case '25000-100000':
                    $query->whereBetween('budget_amount', [25000, 100000]);
                    break;
                case '100000-250000':
                    $query->whereBetween('budget_amount', [100000, 250000]);
                    break;
                case '250000+':
                    $query->where('budget_amount', '>', 250000);
                    break;
            }
        }

        // فلترة المدة - استخدام القيم الرقمية من جدول projects
        if ($request->filled('duration')) {
            switch ($request->duration) {
                case 'short':
                    $query->where('duration', '1'); // أقل من أسبوع
                    break;
                case 'medium':
                    $query->whereIn('duration', ['2', '3']); // أسبوع - شهر
                    break;
                case 'long':
                    $query->where('duration', '4'); // شهر - 3 أشهر
                    break;
                case 'very_long':
                    $query->where('duration', '5'); // أكثر من 3 أشهر
                    break;
            }
        }

        // فلترة مستوى الخبرة
        if ($request->filled('experience')) {
            $query->where('experience_level', $request->experience);
        }

        // فلترة المشاريع المنشورة فقط
        $query->where('status', 'published');

        // الترتيب والترقيم (بعد تطبيق جميع الفلاتر)
        $projects = $query->latest()->paginate(10)->withQueryString();
        //return $projects;
        return view('main.projects.index', compact('projects'));
    }
}
