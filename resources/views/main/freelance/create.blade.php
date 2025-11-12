@extends('main.layout.layout')
@section('main_content')

<section class="bg-white border-b border-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-home"></i>
                </a>
                <span class="text-gray-300">|</span>
                <a href="{{ route('freelancers.index') }}" class="text-gray-600 hover:text-primary">المستقلون</a>
                <span class="text-gray-300">|</span>
                <span class="text-gray-800 font-semibold">إنشاء الملف الشخصي</span>
            </div>
        </div>
    </div>
</section>

<!-- قسم إنشاء البروفايل -->
<section class="bg-gray-50 py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- العنوان الرئيسي -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">إنشاء ملفك الشخصي</h1>
                <p class="text-gray-600">أكمل المعلومات التالية لإنشاء ملف شخصي احترافي يجذب العملاء</p>
            </div>
        </div>

        <form action="{{ route('freelancers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- المعلومات الأساسية -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3">
                        1
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">المعلومات الأساسية</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- التخصص / العنوان -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2" for="title">
                            التخصص / العنوان <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                               placeholder="مثال: مطور واجهات أمامية | مصمم جرافيك محترف"
                               required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- الدولة -->
                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="country">
                            الدولة <span class="text-red-500">*</span>
                        </label>
                        <select id="country"
                                name="country"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            <option value="">اختر الدولة</option>
                            <option value="العراق" {{ old('country', 'العراق') == 'العراق' ? 'selected' : '' }}>العراق</option>
                            <option value="مصر" {{ old('country') == 'مصر' ? 'selected' : '' }}>مصر</option>
                            <option value="السعودية" {{ old('country') == 'السعودية' ? 'selected' : '' }}>السعودية</option>
                            <option value="الإمارات" {{ old('country') == 'الإمارات' ? 'selected' : '' }}>الإمارات</option>
                            <option value="الكويت" {{ old('country') == 'الكويت' ? 'selected' : '' }}>الكويت</option>
                            <option value="قطر" {{ old('country') == 'قطر' ? 'selected' : '' }}>قطر</option>
                            <option value="الأردن" {{ old('country') == 'الأردن' ? 'selected' : '' }}>الأردن</option>
                            <option value="لبنان" {{ old('country') == 'لبنان' ? 'selected' : '' }}>لبنان</option>
                            <option value="المغرب" {{ old('country') == 'المغرب' ? 'selected' : '' }}>المغرب</option>
                            <option value="تونس" {{ old('country') == 'تونس' ? 'selected' : '' }}>تونس</option>
                            <option value="الجزائر" {{ old('country') == 'الجزائر' ? 'selected' : '' }}>الجزائر</option>
                            <option value="فلسطين" {{ old('country') == 'فلسطين' ? 'selected' : '' }}>فلسطين</option>
                            <option value="سوريا" {{ old('country') == 'سوريا' ? 'selected' : '' }}>سوريا</option>
                            <option value="اليمن" {{ old('country') == 'اليمن' ? 'selected' : '' }}>اليمن</option>
                        </select>
                        @error('country')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- سنة الانضمام -->
                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="member_since">
                            سنة البدء كصاحب عمل حر <span class="text-red-500">*</span>
                        </label>
                        <select id="member_since"
                                name="member_since"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                required>
                            <option value="">اختر السنة</option>
                            @for($year = date('Y'); $year >= 2010; $year--)
                                <option value="{{ $year }}" {{ old('member_since', date('Y')) == $year ? 'selected' : '' }}>{{ $year }}</option>
                            @endfor
                        </select>
                        @error('member_since')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- صورة البروفايل -->
                    <div class="md:col-span-2">
                        <label class="block text-gray-700 font-bold mb-2" for="profile_image">
                            صورة البروفايل
                        </label>
                        <div class="flex items-center space-x-4 space-x-reverse">
                            <div class="relative">
                                <img id="preview_image"
                                     src="https://via.placeholder.com/150"
                                     alt="Preview"
                                     class="w-24 h-24 rounded-full object-cover border-4 border-gray-200">
                            </div>
                            <div class="flex-1">
                                <input type="file"
                                       id="profile_image"
                                       name="profile_image"
                                       accept="image/*"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                                       onchange="previewImage(event)">
                                <p class="text-gray-500 text-sm mt-1">الحجم المسموح: 2MB | الصيغ: JPG, PNG</p>
                            </div>
                        </div>
                        @error('profile_image')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- نبذة عني -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3">
                        2
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">نبذة عني</h2>
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2" for="bio">
                        اكتب نبذة تعريفية عنك
                    </label>
                    <textarea id="bio"
                              name="bio"
                              rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
                              placeholder="اكتب نبذة مختصرة عن خبراتك ومهاراتك وما يميزك كمستقل... (اختياري)">{{ old('bio') }}</textarea>
                    <p class="text-gray-500 text-sm mt-1">يفضل كتابة نبذة لا تقل عن 100 حرف لجذب انتباه العملاء</p>
                    @error('bio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- أزرار الحفظ -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0 space-x-4 space-x-reverse">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-info-circle ml-2"></i>
                        <span class="text-sm">الحقول المطلوبة: التخصص، الدولة، وسنة البدء</span>
                    </div>
                    <div class="flex space-x-4 space-x-reverse">
                        <a href="{{ route('home') }}"
                           class="px-6 py-3 border border-gray-300 text-gray-700 font-bold rounded-lg hover:bg-gray-50 transition duration-300">
                            إلغاء
                        </a>
                        <button type="submit"
                                class="px-8 py-3 bg-primary hover:bg-secondary text-white font-bold rounded-lg transition duration-300 shadow-lg">
                            <i class="fas fa-check ml-2"></i>
                            حفظ الملف الشخصي
                        </button>
                    </div>
                </div>
            </div>

            <!-- ملاحظة هامة -->
            <div class="bg-blue-50 border-r-4 border-blue-500 p-4 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                    </div>
                    <div class="mr-3">
                        <p class="text-sm text-blue-700">
                            <strong>ملاحظة:</strong> بعد إنشاء ملفك الشخصي، يمكنك تعديل معلوماتك وإضافة المهارات والشهادات والروابط الاجتماعية من صفحة الإعدادات.
                            الإحصائيات مثل معدل الاستجابة والتقييمات سيتم احتسابها تلقائياً بناءً على نشاطك في المنصة.
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
// معاينة الصورة
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview_image').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

input:focus, textarea:focus, select:focus {
    border-color: #3B82F6;
}

.form-step {
    opacity: 0;
    animation: slideUp 0.6s ease-out forwards;
}

.form-step:nth-child(1) { animation-delay: 0.1s; }
.form-step:nth-child(2) { animation-delay: 0.2s; }
.form-step:nth-child(3) { animation-delay: 0.3s; }

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

@endsection
