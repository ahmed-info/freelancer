<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return $request->all();
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'business_field' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'required|string|max:20',
            'description' => 'nullable|string',
            'terms_accepted' => 'required|accepted',
            'user_id' => 'required|exists:users,id',

        ], [
            'company_name.required' => 'حقل اسم الشركة مطلوب.',
            'business_field.required' => 'حقل مجال العمل مطلوب.',
            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالح.',
            'email.unique' => 'هذا البريد الإلكتروني مسجل مسبقاً.',
            'phone.required' => 'حقل رقم الهاتف مطلوب.',
            'terms_accepted.required' => 'يجب الموافقة على الشروط والأحكام.',
            'terms_accepted.accepted' => 'يجب الموافقة على الشروط والأحكام.',
            'user_id.required' => 'حقل معرف المستخدم مطلوب.',
            'user_id.exists' => 'المستخدم المحدد غير موجود.',
        ]);

        $validator['user_id'] = auth()->user()->id;

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Company::create([
        'company_name' => $request->company_name,
        'business_field' => $request->business_field,
        'email' => $request->email,
        'phone' => $request->phone,
        'description' => $request->description,
        'terms_accepted' => $request->terms_accepted,
        'user_id' => $request->user_id
    ]);
        User::where('id', $request->user_id)->update(['role' => 'company']);

        return redirect()->back()
            ->with('status', 'تم تسجيل شركتك بنجاح! سنقوم بالتواصل معك قريباً.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }
}
