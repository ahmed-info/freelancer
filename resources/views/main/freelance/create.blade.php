@extends('main.layout.layout')
@section('main_content')
    <div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- رأس الصفحة -->
        <div class="text-center mb-8 animate-fade-in-up">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                اكمل ملفك الشخصي كمستقل
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
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                                    placeholder="مثل: مطور واجهات أمامية، مصمم جرافيك محترف"
                                    value="{{ old('title') }}"
                                >
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- البلد -->
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                    الدولة
                                </label>
                                <select
                                    id="country"
                                    name="country"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                                >
                                    <option value="العراق" {{ old('country', 'العراق') == 'العراق' ? 'selected' : '' }}>
                                        العراق
                                    </option>
                                    <option value="السعودية" {{ old('country') == 'السعودية' ? 'selected' : '' }}>
                                        السعودية
                                    </option>
                                    <option value="مصر" {{ old('country') == 'مصر' ? 'selected' : '' }}>
                                        مصر
                                    </option>
                                    <option value="الإمارات" {{ old('country') == 'الإمارات' ? 'selected' : '' }}>
                                        الإمارات
                                    </option>
                                    <option value="الأردن" {{ old('country') == 'الأردن' ? 'selected' : '' }}>
                                        الأردن
                                    </option>
                                    <option value="لبنان" {{ old('country') == 'لبنان' ? 'selected' : '' }}>
                                        لبنان
                                    </option>
                                    <option value="الكويت" {{ old('country') == 'الكويت' ? 'selected' : '' }}>
                                        الكويت
                                    </option>
                                    <option value="قطر" {{ old('country') == 'قطر' ? 'selected' : '' }}>
                                        قطر
                                    </option>
                                    <option value="عمان" {{ old('country') == 'عمان' ? 'selected' : '' }}>
                                        عمان
                                    </option>
                                    <option value="البحرين" {{ old('country') == 'البحرين' ? 'selected' : '' }}>
                                        البحرين
                                    </option>
                                </select>
                                @error('country')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- صورة الملف الشخصي -->
                            <div class="col-span-2">
                                <label for="profile_image" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                    صورة الملف الشخصي
                                </label>
                                <div class="flex items-center justify-center">
                                    <div
                                        class="w-32 h-32 border-2 border-dashed border-gray-300 rounded-full flex items-center justify-center bg-gray-50 hover:bg-gray-100 transition duration-300 cursor-pointer"
                                        onclick="document.getElementById('profile_image').click()"
                                    >
                                        <div class="text-center">
                                            <i class="fas fa-camera text-gray-400 text-2xl mb-2"></i>
                                            <p class="text-xs text-gray-500">اضغط لرفع الصورة</p>
                                        </div>
                                    </div>
                                </div>
                                <input
                                    type="file"
                                    id="profile_image"
                                    name="profile_image"
                                    accept="image/*"
                                    class="hidden"
                                    onchange="previewImage(this)"
                                >
                                @error('profile_image')
                                    <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                                @enderror
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
                            <textarea
                                id="bio"
                                name="bio"
                                rows="6"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                                placeholder="أخبر العملاء عن نفسك، مهاراتك، خبراتك، وإنجازاتك..."
                            >{{ old('bio') }}</textarea>
                            <p class="mt-1 text-sm text-gray-500 text-right">
                                أكتب وصفاً شاملاً يبرز مهاراتك وخبراتك
                            </p>
                            @error('bio')
                                <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- القسم الثالث: المهارات -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">
                            المهارات (اختياري)
                        </h2>
                        <div class="mb-4">
                            <label for="skills-input" class="block text-gray-700 mb-2 font-medium">
                                أضف المهارات المطلوبة لمشروعك
                            </label>
                            <div class="flex flex-col sm:flex-row gap-2">
                                <input
                                    type="text"
                                    id="skills-input"
                                    class="flex-grow px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                    placeholder="اكتب المهارة ثم اضغط Enter لإضافتها"
                                    name="skills[]"
                                >
                                <button
                                    type="button"
                                    id="add-skill-btn"
                                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200 font-medium"
                                >
                                    إضافة
                                </button>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">
                     أضف المهارات الأساسية التي تمتلكها والتي تعتقد أنها ستساعد في إنجاز المشروع بنجاح
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-4" id="skills-container">
                            <!-- سيتم إضافة المهارات هنا ديناميكياً -->
                        </div>
                        <div id="hidden-skills-fields">
                            <!-- سيتم إضافة الحقول المخفية للمهارات هنا -->
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
                            <label for="project_files" class="block text-sm font-medium text-gray-700 mb-2 text-right">
                                أرفق ملفات توضيحية او صور (اختياري)
                            </label>
                            <input
                                type="file"
                                id="project_files"
                                name="project_files[]"
                                multiple
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                            >
                            @error('project_files')
                                <p class="mt-1 text-sm text-red-600 text-right">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- أزرار الإرسال -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-end pt-6 border-t border-gray-200">
                        <button
                            type="button"
                            class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-300 font-medium"
                        >
                            إلغاء
                        </button>
                        <button
                            type="submit"
                            class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-secondary transition duration-300 font-medium shadow-md hover:shadow-lg transform hover:scale-105"
                        >
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

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
@endsection


@push('main_scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const skillsInput = document.getElementById('skills-input');
            const addSkillBtn = document.getElementById('add-skill-btn'); // تم التصحيح
            const skillsContainer = document.getElementById('skills-container');
            const hiddenSkillsFields = document.getElementById('hidden-skills-fields');
            const projectForm = document.getElementById('projectForm'); // تم التصحيح

            // عناصر المعاينة
            const previewTitle = document.getElementById('preview-title');
            const previewDescription = document.getElementById('preview-description');
            const previewSkills = document.getElementById('preview-skills');
            const previewBudget = document.getElementById('preview-budget');


            let skills = [];

            // تحديث المعاينة
            // function updatePreview() {
            //     // تحديث العنوان
            //     const titleInput = document.getElementById('project-title');
            //     previewTitle.textContent = titleInput.value || 'عنوان المشروع';

            //     // تحديث الوصف
            //     const descriptionInput = document.getElementById('project-details');
            //     previewDescription.textContent = descriptionInput.value || 'وصف المشروع سيظهر هنا';

            //     // تحديث الميزانية
            //     const budgetInput = document.getElementById('budget-amount');
            //     previewBudget.textContent = (budgetInput.value || '25,000') + ' د.ع';

            //     // تحديث المهارات في المعاينة
            //     updatePreviewSkills();
            // }

            // تحديث مهارات المعاينة
            function updatePreviewSkills() {
                previewSkills.innerHTML = '';
                skills.forEach(skill => {
                    const skillSpan = document.createElement('span');
                    skillSpan.className =
                        'bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full';
                    skillSpan.textContent = skill;
                    previewSkills.appendChild(skillSpan);
                });
            }

            // إضافة مهارة جديدة
            function addSkill() {
                const skillValue = skillsInput.value.trim();

                if (skillValue && !skills.includes(skillValue)) {
                    skills.push(skillValue);
                    updateSkillsDisplay();
                    //updatePreview();
                }
                skillsInput.value = '';
                skillsInput.focus();

            }

            // إضافة مهارة بالضغط على Enter
            skillsInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addSkill();
                    skillsInput.value = '';
                    skillsInput.focus();
                }

            });

            // زر الإضافة
            addSkillBtn.addEventListener('click', addSkill);

            // تحديث عرض المهارات
            function updateSkillsDisplay() {
                skillsContainer.innerHTML = '';

                skills.forEach((skill, index) => {
                    const skillTag = document.createElement('span');
                    skillTag.className =
                        'bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full flex items-center gap-2';
                    skillTag.innerHTML = `
                    ${skill}
                    <button type="button" class="text-blue-600 hover:text-blue-800 text-lg leading-none remove-skill" data-index="${index}">×</button>
                `;
                    skillsContainer.appendChild(skillTag);
                });

                // إضافة event listeners لأزرار الحذف
                document.querySelectorAll('.remove-skill').forEach(button => {
                    button.addEventListener('click', function() {
                        const index = parseInt(this.getAttribute('data-index'));
                        removeSkill(index);
                    });
                });

                updateHiddenSkillsField();
            }

            // إزالة مهارة
            function removeSkill(index) {
                skills.splice(index, 1);
                updateSkillsDisplay();
                //updatePreview();
            }

            // تحديث الحقول المخفية
            function updateHiddenSkillsField() {
                hiddenSkillsFields.innerHTML = '';

                skills.forEach(skill => {
                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'skills[]';
                    hiddenInput.value = skill;
                    hiddenSkillsFields.appendChild(hiddenInput);
                });
            }



            // التحقق من صحة النموذج
            function validateForm() {
                const title = document.getElementById('project-title').value.trim();
                const description = document.getElementById('project-details').value.trim();

                if (!title) {
                    alert('يرجى إدخال عنوان للمشروع');
                    document.getElementById('project-title').focus();
                    return false;
                }

                if (!description) {
                    alert('يرجى إدخال وصف للمشروع');
                    document.getElementById('project-details').focus();
                    return false;
                }

                if (skills.length === 0) {
                    alert('يرجى إضافة مهارة واحدة على الأقل');
                    skillsInput.focus();
                    return false;
                }

                return true;
            }

            // // // التحقق قبل إرسال النموذج
            // projectForm.addEventListener('submit', function(e) {
            //     if (!validateForm()) {
            //         e.preventDefault();
            //         return;
            //     }

            //     // تحديث الحقول المخفية قبل الإرسال
            //     updateHiddenSkillsField();
            // });

            // استمع لتغييرات المدخلات لتحديث المعاينة
            //document.getElementById('project-title').addEventListener('input', updatePreview);
            //document.getElementById('project-details').addEventListener('input', updatePreview);
            //document.getElementById('budget-amount').addEventListener('input', updatePreview);

            // منع إرسال النموذج عند الضغط على Enter في حقل المهارات
            skillsInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                }
            });

            // التهيئة الأولية
            //updatePreview();
        });
    </script>
@endpush
