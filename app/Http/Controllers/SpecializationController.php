<?php

namespace App\Http\Controllers;

use App\Models\Myjob;
use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    public function index()
    {
        $specializations = Specialization::with('myjobs')->get();

        return view('admin.specializations.index', compact('specializations'));
    }

    public function create()
    {
        $specializations = Specialization::latest()->get();

        return view('admin.specializations.create', compact('specializations'));
    }

    //store specialization
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:specializations,name',
        ],
            [
                'name.required' => 'حقل التخصص مطلوب.',
            ]);

        $specialization = Specialization::create([
            'name' => $validated['name'],
        ]);

        return redirect()->back()
            ->with('status', 'تم إضافة التخصص والوظائف بنجاح');
    }

    public function storeJobs(Request $request)
    {
        $validated = $request->validate([
            'new_jobs' => 'sometimes|array',
            'new_jobs.*' => 'required|string|max:255',
            //'name' => 'required|string|max:255|unique:specializations,name',
            'specialization_id' => 'sometimes|exists:specializations,id',
        ],
            [
                'name.unique' => 'هذا التخصص موجود بالفعل.',
                'new_jobs.*.required' => 'اسم الوظيفة مطلوب.',
            ]);

        // إضافة الوظائف الفرعية إذا وجدت
        if (isset($validated['new_jobs']) && count($validated['new_jobs']) > 0) {
            foreach ($validated['new_jobs'] as $jobName) {
                MyJob::create([
                    'name' => $jobName,
                    'specialization_id' => $validated['specialization_id'] ?? null,
                ]);
            }
        }

        return redirect()->back()
            ->with('status', 'تم إضافة التخصص والوظائف بنجاح');
    }

    public function show($id)
    {
        // $specialization = Specialization::find($id);
        // return view('admin.specializations.show', compact('specialization'));
    }

    public function edit($id)
    {
        $specialization = Specialization::find($id);

        return view('admin.specializations.edit', compact('specialization'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'new_jobs' => 'sometimes|array',
            'new_jobs.*' => 'string|max:255',
            'deleted_jobs' => 'sometimes|array',
            'deleted_jobs.*' => 'exists:myjobs,id',
        ]);

        $specialization = Specialization::find($id);

        // تحديث التخصص الرئيسي
        $specialization->update([
            'name' => $validated['name'],
        ]);

        // حذف الوظائف المحددة
        if (isset($validated['deleted_jobs'])) {
            MyJob::whereIn('id', $validated['deleted_jobs'])->delete();
        }

        // إضافة الوظائف الجديدة
        if (isset($validated['new_jobs'])) {
            foreach ($validated['new_jobs'] as $jobName) {
                $specialization->myjobs()->create([
                    'name' => $jobName,
                ]);
            }
        }

        return redirect()->route('specializations.index')
            ->with('status', 'تم تحديث التخصص والوظائف بنجاح');
    }

    public function destroy($id)
    {
        $specialization = Specialization::find($id);
        $specialization->delete();

        return redirect()->route('specializations.index')->with('status', 'تم حذف التخصص بنجاح');
    }
}
