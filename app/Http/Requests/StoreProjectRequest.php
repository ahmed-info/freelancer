<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                'min:10'
            ],
            'description' => [
                'required',
                'string',
                'min:50',
                'max:5000'
            ],

            'budget_amount' => [
                'required',
                'nullable',
                'numeric',
                'min:5',
                'max:1000000'
            ],
            'hourly_rate' => [
                'required',
                'nullable',
                'numeric',
                'min:5',
                'max:500'
            ],

            'duration' => [
                'required',
                'in:1,2,3,4,5'
            ],
            'skills' => [
                'required',
                'array',
                'min:1',
                'max:10'
            ],
            'skills.*' => [
                'string',
                'max:50'
            ],
            'attachments' => [
                'nullable',
                'array',
                'max:5'
            ],
            'attachments.*' => [
                'file',
                'max:10240', // 10MB
                'mimes:pdf,doc,docx,jpg,jpeg,png,gif,zip,rar'
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            // عنوان المشروع
            'title.required' => 'عنوان المشروع مطلوب',
            'title.min' => 'يجب أن يكون العنوان 10 أحرف على الأقل',
            'title.max' => 'العنوان طويل جداً (الحد الأقصى 255 حرف)',

            // وصف المشروع
            'description.required' => 'وصف المشروع مطلوب',
            'description.min' => 'يجب أن يكون الوصف 50 حرفاً على الأقل',
            'description.max' => 'الوصف طويل جداً (الحد الأقصى 5000 حرف)',

            // الميزانية
            'budget_amount.required_if' => 'مبلغ الميزانية مطلوب',
            'budget_amount.min' => 'الحد الأدنى للميزانية هو 5 دولار',
            'budget_amount.max' => 'الميزانية تتجاوز الحد المسموح',

            // السعر بالساعة
            'hourly_rate.required_if' => 'السعر بالساعة مطلوب',
            'hourly_rate.min' => 'الحد الأدنى للسعر هو 5 دولار بالساعة',
            'hourly_rate.max' => 'السعر بالساعة يتجاوز الحد المسموح',

            // المدة
            'duration.required' => 'مدة المشروع مطلوبة',
            'duration.in' => 'مدة المشروع غير صحيحة',

            // المهارات
            'skills.required' => 'يجب إضافة مهارة واحدة على الأقل',
            'skills.min' => 'يجب إضافة مهارة واحدة على الأقل',
            'skills.max' => 'لا يمكن إضافة أكثر من 10 مهارات',
            'skills.*.max' => 'اسم المهارة طويل جداً',

            // الملفات
            'attachments.max' => 'لا يمكن رفع أكثر من 5 ملفات',
            'attachments.*.file' => 'الملف غير صالح',
            'attachments.*.max' => 'حجم الملف لا يجب أن يتجاوز 10MB',
            'attachments.*.mimes' => 'نوع الملف غير مدعوم',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'title' => 'عنوان المشروع',
            'description' => 'وصف المشروع',
            'budget_type' => 'نوع الميزانية',
            'budget_amount' => 'مبلغ الميزانية',
            'duration' => 'المدة',
            'skills' => 'المهارات',
            'attachments' => 'الملفات المرفقة',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // تنظيف المهارات من المسافات الزائدة
        if ($this->has('skills') && is_array($this->skills)) {
            $this->merge([
                'skills' => array_map('trim', array_filter($this->skills))
            ]);
        }
    }
}
