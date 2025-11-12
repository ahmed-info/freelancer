<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Skill;

class FreelancerController extends Controller
{
    /**
     * عرض صفحة البروفايل
     */
    public function show(Freelancer $freelancer): View
    {
        // تحميل العلاقات المطلوبة مع eager loading لتحسين الأداء
        $freelancer->load([
            'user',
            'skills',
            'activeServices' => function ($query) {
                $query->latest()->limit(4);
            },
            'completedProjects' => function ($query) {
                $query->latest()->limit(4);
            },
            'reviews' => function ($query) {
                $query->with('client')->latest()->limit(3);
            }
        ]);

        return view('main.profile.show', compact('freelancer'));
    }

    public function create(): View
    {
        $skills = Skill::all();
        $countries = $this->getCountries();
        $freelancer = Freelancer::first();

        return view('main.freelance.create', compact('skills', 'countries', 'freelancer'));
    }

    public function store(Request $request)
    {
        // تحقق من صحة البيانات المدخلة
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'country' => 'required|string|max:100',
            'profile_image' => 'nullable|image|max:2048',
            'member_since' => 'nullable|date',
            'skills' => 'nullable|array',
            'skills.*' => 'exists:skills,id',
        ]);

        //return $request->all();

        // إنشاء ملف المستقل الجديد
        $freelancer = new Freelancer($validatedData);
        $freelancer->user_id = 1;

        // حفظ صورة الملف الشخصي إذا تم تحميلها
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $filename = time() .'.'. $file->getClientOriginalExtension();
            $file->move(public_path('uploads/freelancers'), $filename);
            $freelancer->profile_image = 'uploads/freelancers/' . $filename;

        }

        $freelancer->save();

        return redirect()->route('profile.main', $freelancer->id)->with('status', 'تم إنشاء ملفك الشخصي كمستقل بنجاح!');
    }

    /**
     * عرض جميع الخدمات
     */
    public function services(Freelancer $freelancer): View
    {
        $services = $freelancer->activeServices()
            ->paginate(12);

        return view('main.profile.services', compact('freelancer', 'services'));
    }

    /**
     * عرض جميع المشاريع
     */
    public function projects(Freelancer $freelancer): View
    {
        $projects = $freelancer->completedProjects()
            ->with('client')
            ->paginate(12);

        return view('main.profile.projects', compact('freelancer', 'projects'));
    }

    /**
     * عرض جميع التقييمات
     */
    public function reviews(Freelancer $freelancer): View
    {
        $reviews = $freelancer->reviews()
            ->with('client', 'project')
            ->latest()
            ->paginate(10);

        return view('main.profile.reviews', compact('freelancer', 'reviews'));
    }

    /**
     * البحث عن المستقلين
     */
    public function index(Request $request): View
    {
        $query = Freelancer::with('user', 'skills');

        // البحث بالاسم
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // فلترة حسب المهارة
        if ($request->filled('skill')) {
            $query->whereHas('skills', function ($q) use ($request) {
                $q->where('slug', $request->skill);
            });
        }

        // فلترة حسب الدولة
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // فلترة الموثقين فقط
        if ($request->boolean('verified')) {
            $query->verified();
        }

        // فلترة المتصلين فقط
        if ($request->boolean('online')) {
            $query->online();
        }

        // الترتيب
        $sort = $request->get('sort', 'rating');
        switch ($sort) {
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'projects':
                $query->orderBy('projects_count', 'desc');
                break;
            case 'reviews':
                $query->orderBy('reviews_count', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
        }

        $freelancers = $query->paginate(12);

        return view('main.freelance.index', compact('freelancers'));
    }

    public function adminIndex(Request $request): View
    {
        $query = Freelancer::with('user', 'skills');

        // البحث بالاسم
        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        // فلترة حسب المهارة
        if ($request->filled('skill')) {
            $query->whereHas('skills', function ($q) use ($request) {
                $q->where('slug', $request->skill);
            });
        }

        // فلترة حسب الدولة
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // فلترة الموثقين فقط
        if ($request->boolean('verified')) {
            $query->verified();
        }

        // فلترة المتصلين فقط
        if ($request->boolean('online')) {
            $query->online();
        }

        // الترتيب
        $sort = $request->get('sort', 'rating');
        switch ($sort) {
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'projects':
                $query->orderBy('projects_count', 'desc');
                break;
            case 'reviews':
                $query->orderBy('reviews_count', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
        }

        $freelancers = $query->paginate(12);

        return view('admin.freelance.index', compact('freelancers'));
    }


    private function getCountries(): array
    {
        return [
            'السعودية' => 'السعودية',
            'الإمارات' => 'الإمارات',
            'مصر' => 'مصر',
            'الأردن' => 'الأردن',
            'الكويت' => 'الكويت',
            'قطر' => 'قطر',
            'البحرين' => 'البحرين',
            'عمان' => 'عمان',
            'لبنان' => 'لبنان',
            'فلسطين' => 'فلسطين',
            'العراق' => 'العراق',
            'سوريا' => 'سوريا',
            'المغرب' => 'المغرب',
            'الجزائر' => 'الجزائر',
            'تونس' => 'تونس',
            'ليبيا' => 'ليبيا',
            'السودان' => 'السودان',
            'اليمن' => 'اليمن',
            'أخرى' => 'أخرى',
        ];
    }
}
