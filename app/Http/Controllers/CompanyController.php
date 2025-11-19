<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::latest()->paginate(8);
        //return $companies;
        return view('admin.companies.index', compact('companies'));
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
       // return $request->all();
    $validator = Validator::make($request->all(), [
        'company_name' => 'required|string|max:255',
        'business_field' => 'required|string|max:255',
        'email' => 'required|email|unique:companies,email',
        'phone' => 'required|string|digits_between:11,11|starts_with:07',
        'description' => 'nullable|string',
        'terms_accepted' => 'required|accepted',
    ], [
        'company_name.required' => 'حقل اسم الشركة مطلوب.',
        'business_field.required' => 'حقل مجال العمل مطلوب.',
        'email.required' => 'حقل البريد الإلكتروني مطلوب.',
        'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
        'email.unique' => 'هذا البريد الإلكتروني مستخدم بالفعل.',
        'phone.required' => 'حقل رقم الهاتف مطلوب.',
        'phone.digits_between' => 'يجب أن يكون رقم الهاتف مكونًا من 11 رقمًا.',
        'phone.starts_with' => 'يجب أن يبدأ رقم الهاتف بـ 07',
        'terms_accepted.required' => 'يجب قبول الشروط والأحكام.',
        'terms_accepted.accepted' => 'يجب قبول الشروط والأحكام.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // إنشاء المستخدم أولاً
    $user = User::create([
        'name' => $request->company_name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // تأكد من وجود password في ال request
        'phone' => $request->phone,
        'role' => 'company',
    ]);
    $userId = $user->id;


    // ثم إنشاء الشركة مع ربطها بالمستخدم
    Company::create([
        'company_name' => $request->company_name,
        'business_field' => $request->business_field,
        'email' => $request->email,
        'phone' => $request->phone,
        'description' => $request->description,
        'terms_accepted' => $request->terms_accepted == 'on' ? true : false,
        'user_id' => $userId // استخدام id المستخدم الجديد
    ]);

    // إزالة return الزائد
    return redirect()->back()
        ->with('success', 'تم تسجيل شركتك بنجاح! سنقوم بالتواصل معك قريباً.');
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
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'business_field' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'phone' => 'required|string|digits_between:11,11|starts_with:07',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company->update([
            'company_name' => $request->company_name,
            'business_field' => $request->business_field,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'logo' => $request->hasFile('logo') ? $request->file('logo')->store('company_logos', 'public') : $company->logo,
        ]);

        return redirect()->route('companies.index')
            ->with('status', 'تم تحديث بيانات الشركة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $destination = public_path($company->logo);
        if(File::exists($destination)){
            File::delete($destination);
        }
        $company->delete();

        return redirect()->route('companies.index')
            ->with('status', 'تم حذف الشركة بنجاح.');
    }
}
