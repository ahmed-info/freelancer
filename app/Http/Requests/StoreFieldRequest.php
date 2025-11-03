<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'حقل عنوان المجال مطلوب.',
            'name.string' => 'حقل عنوان المجال يجب أن يكون نصًا.',
            'name.max' => 'حقل عنوان المجال لا يجب أن يتجاوز 255 حرفًا.',
            'description.required' => 'حقل الوصف مطلوب.',
            'description.string' => 'حقل الوصف يجب أن يكون نصًا.',
            'icon.string' => 'حقل الأيقونة يجب أن يكون نصًا.',
        ];
    }
}
