@extends('main.layout.layout')
@section('main_content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- رأس الصفحة -->
            <div class="text-center mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">
                    ملفك الشخصي كصاحب عمل حر
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    أضف معلوماتك الشخصية والمهنية لزيادة فرصك في الحصول على المشاريع
                </p>
            </div>

            <!-- نموذج إدخال البيانات -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden animate-fade-in-up" style="animation-delay: 0.1s">
                <form action="{{ route('freelancers.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf

                    <div class="space-y-8">
                        <!-- القسم الأول: المعلومات الأساسية -->
                        <div class="border-b border-gray-200 pb-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                                المعلومات الأساسية
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- المستخدم (مخفي) -->
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                                <!-- العنوان الوظيفي -->
                                <div class="col-span-2">
                                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                        العنوان الوظيفي *
                                    </label>
                                    <input type="text" id="title" name="title" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                                        placeholder="مثل: مطور واجهات أمامية، مصمم جرافيك محترف"
                                        value="{{ $freelancer->title ?? old('title') }}">
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- البلد -->
                                <div>
                                    <label for="country" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                        الدولة
                                    </label>
                                    <select id="country" name="country"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right">
                                        <option value="العراق"
                                            {{ ($freelancer->country ?? old('country')) == 'العراق' ? 'selected' : '' }}>
                                            العراق</option>
                                        <option value="مصر"
                                            {{ ($freelancer->country ?? old('country')) == 'مصر' ? 'selected' : '' }}>مصر
                                        </option>
                                        <option value="السعودية"
                                            {{ ($freelancer->country ?? old('country')) == 'السعودية' ? 'selected' : '' }}>
                                            السعودية</option>
                                        <option value="الأردن"
                                            {{ ($freelancer->country ?? old('country')) == 'الأردن' ? 'selected' : '' }}>
                                            الأردن</option>
                                        <option value="الإمارات"
                                            {{ ($freelancer->country ?? old('country')) == 'الإمارات' ? 'selected' : '' }}>
                                            الإمارات</option>
                                        <option value="تونس"
                                            {{ ($freelancer->country ?? old('country')) == 'تونس' ? 'selected' : '' }}>تونس
                                        </option>
                                        <option value="المغرب"
                                            {{ ($freelancer->country ?? old('country')) == 'المغرب' ? 'selected' : '' }}>
                                            المغرب</option>
                                        <option value="لبنان"
                                            {{ ($freelancer->country ?? old('country')) == 'لبنان' ? 'selected' : '' }}>
                                            لبنان</option>
                                        <option value="سوريا"
                                            {{ ($freelancer->country ?? old('country')) == 'سوريا' ? 'selected' : '' }}>
                                            سوريا</option>
                                        <option value="اليمن"
                                            {{ ($freelancer->country ?? old('country')) == 'اليمن' ? 'selected' : '' }}>
                                            اليمن</option>
                                        <option value="فلسطين"
                                            {{ ($freelancer->country ?? old('country')) == 'فلسطين' ? 'selected' : '' }}>
                                            فلسطين</option>
                                        <option value="الكويت"
                                            {{ ($freelancer->country ?? old('country')) == 'الكويت' ? 'selected' : '' }}>
                                            الكويت</option>
                                        <option value="قطر"
                                            {{ ($freelancer->country ?? old('country')) == 'قطر' ? 'selected' : '' }}>قطر
                                        </option>
                                        <option value="البحرين"
                                            {{ ($freelancer->country ?? old('country')) == 'البحرين' ? 'selected' : '' }}>
                                            البحرين</option>
                                        <option value="عمان"
                                            {{ ($freelancer->country ?? old('country')) == 'عمان' ? 'selected' : '' }}>عمان
                                        </option>
                                        <option value="ليبيا"
                                            {{ ($freelancer->country ?? old('country')) == 'ليبيا' ? 'selected' : '' }}>
                                            ليبيا</option>
                                        <!-- بقية الخيارات -->
                                    </select>
                                    @error('country')
                                        <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- صورة الملف الشخصي -->
                                <div class="flex items-center justify-center">
                                    <input type="file" id="profile_image" name="profile_image" accept="image/*"
                                           class="hidden" onchange="previewImage(this)">
                                    <div class="w-32 h-32 border-2 border-dashed border-gray-300 rounded-full flex items-center justify-center bg-gray-50 hover:bg-gray-100 transition duration-300 cursor-pointer"
                                        onclick="document.getElementById('profile_image').click()">
                                        @if (isset($freelancer) && $freelancer->profile_image)
                                            <img src="{{ asset($freelancer->profile_image) }}" alt="صورة الملف الشخصي"
                                                class="w-32 h-32 rounded-full object-cover">
                                        @else
                                            <div class="text-center">
                                                <i class="fas fa-camera text-gray-400 text-2xl mb-2"></i>
                                                <p class="text-xs text-gray-500">اضغط لرفع الصورة</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- القسم الثاني: السيرة الذاتية -->
                        <div class="border-b border-gray-200 pb-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                                السيرة الذاتية
                            </h2>

                            <div>
                                <label for="bio" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                    نبذة عنك *
                                </label>
                                <textarea id="bio" name="bio" rows="6" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                                    placeholder="أخبر العملاء عن نفسك، مهاراتك، خبراتك، وإنجازاتك...">{{ $freelancer->bio ?? old('bio') }}</textarea>
                                <p class="mt-1 text-sm text-gray-500 text-right">
                                    أكتب وصفاً شاملاً يبرز مهاراتك وخبراتك
                                </p>
                                @error('bio')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- القسم الثالث: المهارات -->
                        <div class="border-b border-gray-200 pb-8">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                                المهارات (اختياري)
                            </h2>
                            <div class="mb-4">
                                <label for="skills-input" class="block text-gray-700 mb-2 font-medium text-right">
                                    أضف مهاراتك
                                </label>
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <input type="text" id="skills-input"
                                        class="flex-grow px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 text-right"
                                        placeholder="اكتب المهارة ثم اضغط Enter لإضافتها">
                                    <button type="button" id="add-skill-btn"
                                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200 font-medium">
                                        إضافة
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-2 text-right">
                                    أضف المهارات الأساسية التي تمتلكها
                                </p>
                            </div>
                            <div class="flex flex-wrap gap-2 mt-4" id="skills-container">
                                <!-- المهارات الموجودة مسبقاً -->
                                @if(isset($freelancer) && $freelancer->skills)
                                    @php
                                        $existingSkills = is_array($freelancer->skills)
                                            ? $freelancer->skills
                                            : json_decode($freelancer->skills, true) ?? [];
                                    @endphp
                                    @foreach($existingSkills as $skill)
                                        <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full flex items-center gap-2">
                                            {{ $skill }}
                                            <button type="button" class="text-blue-600 hover:text-blue-800 text-lg leading-none remove-skill">×</button>
                                        </span>
                                    @endforeach
                                @endif
                            </div>
                            <div id="hidden-skills-fields">
                                <!-- الحقول المخفية للمهارات الموجودة -->
                                @if(isset($freelancer) && $freelancer->skills)
                                    @foreach($existingSkills as $skill)
                                        <input type="hidden" name="skills[]" value="{{ $skill }}">
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!-- القسم الرابع: عنوان المشروع -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            عنوان المشروع
                        </h2>
                        <div>
                            <label for="project-title" class="block text-gray-700 mb-2 font-medium">
                                اكتب عنواناً واضحاً لمشروعك
                            </label>
                            <input
                                type="text"
                                id="project-title"
                                name="title_project"
                                value="{{ old('title_project', '') }}"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="مثال: أريد تصميم شعار احترافي لشركتي الناشئة"
                            >
                            <p class="text-sm text-gray-500 mt-2">
                                يجب أن يكون العنوان وصفاً دقيقاً لمشروعك
                            </p>
                        </div>
                    </div>

                    <!-- القسم الخامس: تفاصيل المشروع -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            تفاصيل المشروع
                        </h2>
                        <div>
                            <label for="project-details" class="block text-gray-700 mb-2 font-medium">
                                صف مشروعك بالتفصيل
                            </label>
                            <textarea
                                id="project-details"
                                name="description_project"
                                rows="6"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                placeholder="أدخل وصفاً مفصلاً لمشروعك، المهام المطلوبة، النتائج المتوقعة، وأي معلومات أخرى تساعد المطورين على فهم متطلباتك"
                            >{{ old('description_project', '') }}</textarea>
                            <p class="text-sm text-gray-500 mt-2">
                                كلما كانت التفاصيل أكثر وضوحاً، زادت جودة العروض التي ستتلقاها
                            </p>
                        </div>
                    </div>

                    <!-- القسم السادس: الملفات المرفقة -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            الملفات المرفقة
                        </h2>
                        <div>
                            <label for="attachments" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                أرفق ملفات توضيحية او صور (اختياري)
                            </label>
                            <input
                                type="file"
                                id="attachments"
                                name="attachments[]"
                                multiple
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                            >
                            @error('attachments')
                                <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                        <!-- أزرار الإرسال -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-end pt-6">
                            <button type="button"
                                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300 font-medium">
                                إلغاء
                            </button>
                            <button type="submit"
                                class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-secondary transition duration-300 font-medium shadow-md hover:shadow-lg transform hover:scale-105">
                                حفظ الملف الشخصي
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- معلومات إضافية -->
            <div class="mt-8 text-center animate-fade-in-up" style="animation-delay: 0.3s">
                <p class="text-gray-600 text-sm">
                    ✨ سيظهر ملفك الشخصي للعملاء بعد الموافقة عليه من قبل الإدارة
                </p>
            </div>
        </div>
    </div>

    <script>
        // معاينة الصورة قبل الرفع
        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = input.previousElementSibling;
                    previewContainer.innerHTML = `
                <img src="${e.target.result}" alt="معاينة الصورة" class="w-32 h-32 rounded-full object-cover">
            `;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // التحقق من صحة البيانات قبل الإرسال
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            form.addEventListener('submit', function(e) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('border-red-500');
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('يرجى ملء جميع الحقول الإلزامية');
                }
            });
        });
    </script>

    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
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

@push('main_scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const skillsInput = document.getElementById('skills-input');
        const addSkillBtn = document.getElementById('add-skill-btn');
        const skillsContainer = document.getElementById('skills-container');
        const hiddenSkillsFields = document.getElementById('hidden-skills-fields');

        // تهيئة المهارات من البيانات الموجودة
        function initializeExistingSkills() {
            const existingSkillElements = skillsContainer.querySelectorAll('span');
            existingSkillElements.forEach(skillElement => {
                const removeBtn = skillElement.querySelector('.remove-skill');
                if (removeBtn) {
                    removeBtn.addEventListener('click', function() {
                        skillElement.remove();
                        updateHiddenSkillsFields();
                    });
                }
            });
        }

        // إضافة مهارة جديدة
        function addSkill() {
            const skillValue = skillsInput.value.trim();

            if (skillValue) {
                // التحقق من عدم تكرار المهارة
                const existingSkills = Array.from(skillsContainer.querySelectorAll('span'))
                    .map(span => span.textContent.replace('×', '').trim());

                if (!existingSkills.includes(skillValue)) {
                    const skillTag = document.createElement('span');
                    skillTag.className = 'bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full flex items-center gap-2';
                    skillTag.innerHTML = `
                        ${skillValue}
                        <button type="button" class="text-blue-600 hover:text-blue-800 text-lg leading-none remove-skill">×</button>
                    `;

                    skillsContainer.appendChild(skillTag);

                    // إضافة event listener لزر الحذف
                    skillTag.querySelector('.remove-skill').addEventListener('click', function() {
                        skillTag.remove();
                        updateHiddenSkillsFields();
                    });

                    updateHiddenSkillsFields();
                }

                skillsInput.value = '';
            }
            skillsInput.focus();
        }

        // تحديث الحقول المخفية
        function updateHiddenSkillsFields() {
            hiddenSkillsFields.innerHTML = '';
            const skillElements = skillsContainer.querySelectorAll('span');

            skillElements.forEach(skillElement => {
                const skillText = skillElement.textContent.replace('×', '').trim();
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'skills[]';
                hiddenInput.value = skillText;
                hiddenSkillsFields.appendChild(hiddenInput);
            });
        }

        // إضافة مهارة بالضغط على Enter
        skillsInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addSkill();
            }
        });

        // إضافة مهارة بالضغط على الزر
        addSkillBtn.addEventListener('click', addSkill);

        // تهيئة المهارات الموجودة عند تحميل الصفحة
        initializeExistingSkills();
    });
</script>
@endpush
