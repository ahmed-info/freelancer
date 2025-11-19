<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            },
        ]);

        return view('main.profile.show', compact('freelancer'));
    }

    public function dashboardfreelance()
    {
        $userId = auth()->user()->id;
        $freelancer = Freelancer::where('user_id', $userId)->with('projects')->first();

        // return "abcd";
        // return ['userId' => $userId, 'freelancer' => $freelancer];
        return view('dashboardfreelance', compact('freelancer'));
    }

    public function create()
    {
        $freelancer = Freelancer::where('user_id', auth()->id())->first();
        $project = Project::latest()->first();

        // return [$freelancer, $project];
        $skills = [];
        $countries = $this->getCountries();

        if ($freelancer && $freelancer->skills) {
            $skills = json_decode($freelancer->skills, true);
        }

        // return $freelancer;
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
            'skills' => 'nullable|array',
        ]);

       // return $request->all();

        // البحث عن ملف المستقل الحالي أو إنشاء جديد
        $freelancer = Freelancer::firstOrNew(['user_id' => auth()->id()]);
        $message = $freelancer->exists
        ? 'تم تحديث ملفك الشخصي بنجاح!'
        : 'تم إنشاء ملفك الشخصي كصاحب عمل حر بنجاح!';

        // تحديث البيانات
        $freelancer->fill([
            'title' => $request->title,
            'bio' => $request->bio,
            'country' => $request->country,
            'skills' => json_encode($request->skills ?? []),
        ]);

        // معالجة صورة الملف الشخصي
        if ($request->hasFile('profile_image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($freelancer->profile_image) {
                $oldImagePath = public_path($freelancer->profile_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $filename = time().'.'.$request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('uploads/freelancers'), $filename);
            $freelancer->profile_image = 'uploads/freelancers/'.$filename;
        }

        $freelancer->save();

        // return redirect()->route('profile.main', $freelancer->id)->with('status', $message);

        $project = new Project;
        $project->title = $request->title_project;
        $project->description = $request->description_project;
        $project->skills = json_encode($request->skills ?? []);
        $project->duration = $request->duration ?? '1-2';
        $project->freelancer_id = $freelancer->id;
        $project->user_id = auth()->id();
        $project->attachments = null; // Initialize


        if ($request->hasFile('attachments')) {
            $attachmentsPaths = [];
            $uploadPath = public_path('uploads/projects');
            // Ensure the directory exists
            if (! file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            foreach ($request->file('attachments') as $file) {
                $fileName = time().'_'.uniqid().'_'.$file->getClientOriginalName();
                // Move the file to the public directory
                $file->move($uploadPath, $fileName);
                // Save the path relative to public, so we can use it in the frontend
                $attachmentsPaths[] = 'uploads/projects/'.$fileName;
            }

            $project->attachments = json_encode($attachmentsPaths);

            //return $project->attachments;
        }
        $project->save();

            //return "ok attachments uploaded";

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

        $freelancers = $query->paginate(8);
        // return $freelancers;

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
