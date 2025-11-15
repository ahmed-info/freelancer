<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء مشروع جديد</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [dir="rtl"] {
            direction: rtl;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 py-8" dir="rtl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm p-6">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-3">إنشاء مشروع جديد</h1>
                        <p class="text-gray-600 text-lg">أضف تفاصيل مشروعك لتبدأ في تلقي عروض من أصحاب العمل الحر الموهوبين</p>
                    </div>

                    <form method="POST" action="{{ route('projects.store') }}" class="space-y-8" id="projectForm">
                        @csrf

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">عنوان المشروع</h2>
                            <div>
                                <label for="project-title" class="block text-gray-700 mb-2 font-medium">اكتب عنواناً واضحاً لمشروعك</label>
                                <input
                                    type="text"
                                    id="project-title"
                                    name="title"
                                    value="{{ old('title', 'اول عنوان') }}"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                    placeholder="مثال: أريد تصميم شعار احترافي لشركتي الناشئة"
                                />
                                <p class="text-sm text-gray-500 mt-2">يجب أن يكون العنوان وصفاً دقيقاً لمشروعك</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">تفاصيل المشروع</h2>
                            <div>
                                <label for="project-details" class="block text-gray-700 mb-2 font-medium">صف مشروعك بالتفصيل</label>
                                <textarea
                                    id="project-details"
                                    name="description"
                                    rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                    placeholder="أدخل وصفاً مفصلاً لمشروعك، المهام المطلوبة، النتائج المتوقعة، وأي معلومات أخرى تساعد المطورين على فهم متطلباتك"
                                >{{ old('description', 'وصف المشروع يظهر هنا بطريقة مختصرة وجذابة للمطورين المحتملين.') }}</textarea>
                                <p class="text-sm text-gray-500 mt-2">كلما كانت التفاصيل أكثر وضوحاً، زادت جودة العروض التي ستتلقاها</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">المهارات المطلوبة</h2>
                            <div class="mb-4">
                                <label for="skills-input" class="block text-gray-700 mb-2 font-medium">أضف المهارات المطلوبة لمشروعك</label>
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <input
                                        type="text"
                                        id="skills-input"
                                        class="flex-grow px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="اكتب المهارة ثم اضغط Enter لإضافتها"
                                    />
                                    <button
                                        type="button"
                                        id="add-skill-btn"
                                        class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-200 font-medium"
                                    >
                                        إضافة
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-2">أضف المهارات الأساسية التي يجب أن يمتلكها المطور لتنفيذ مشروعك</p>
                            </div>
                            <div class="flex flex-wrap gap-2 mt-4" id="skills-container">
                                <!-- سيتم إضافة المهارات هنا ديناميكياً -->
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full flex items-center gap-2">
                                    تصميم
                                    <button type="button" class="text-blue-600 hover:text-blue-800 text-lg leading-none remove-skill" data-id="1">×</button>
                                </span>
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full flex items-center gap-2">
                                    تطوير ويب
                                    <button type="button" class="text-blue-600 hover:text-blue-800 text-lg leading-none remove-skill" data-id="2">×</button>
                                </span>
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1.5 rounded-full flex items-center gap-2">
                                    UI/UX
                                    <button type="button" class="text-blue-600 hover:text-blue-800 text-lg leading-none remove-skill" data-id="3">×</button>
                                </span>
                            </div>
                            <input type="hidden" name="skills" id="skills-input-hidden" value='["تصميم", "تطوير ويب", "UI/UX"]'>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gray-50 rounded-xl p-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">الميزانية</h2>
                                <div>
                                    <label for="budget-amount" class="block text-gray-700 mb-2 font-medium">الميزانية (بالدينار)</label>
                                    <input
                                        type="number"
                                        id="budget-amount"
                                        name="budget"
                                        value="{{ old('budget', '25000') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                        placeholder="مثال: 25000"
                                    />
                                </div>
                            </div>

                            <div class="bg-gray-50 rounded-xl p-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-200">مدة المشروع</h2>
                                <div>
                                    <label for="duration" class="block text-gray-700 mb-2 font-medium">المدة المتوقعة لإنجاز المشروع</label>
                                    <select
                                        id="duration"
                                        name="duration"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200"
                                    >
                                        <option value="1">أقل من أسبوع</option>
                                        <option value="2">أسبوع - أسبوعين</option>
                                        <option value="3">أسبوعين - شهر</option>
                                        <option value="4">شهر - 3 أشهر</option>
                                        <option value="5">أكثر من 3 أشهر</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                            <button
                                type="button"
                                id="save-draft"
                                class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition duration-200 font-medium"
                            >
                                حفظ كمسودة
                            </button>
                            <button
                                type="submit"
                                class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200 font-medium"
                            >
                                نشر المشروع
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm p-6 sticky top-8">
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">معاينة المشروع</h2>
                        <p class="text-gray-600 text-sm mb-4">هكذا سيظهر مشروعك بعد النشر</p>
                    </div>

                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-200">
                        <div class="flex items-center gap-2 mb-3">
                            <h3 class="text-lg font-bold text-gray-800" id="preview-title">اول عنوان</h3>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">جديد</span>
                        </div>
                        <p class="text-gray-600 text-sm mb-4" id="preview-description">
                            وصف المشروع يظهر هنا بطريقة مختصرة وجذابة للمطورين المحتملين.
                        </p>

                        <div class="flex flex-wrap gap-2 mb-4" id="preview-skills">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">تصميم</span>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">تطوير ويب</span>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">UI/UX</span>
                        </div>

                        <div class="flex flex-wrap gap-4 text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                السعودية
                            </span>
                            <span class="flex items-center">
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                منذ دقائق
                            </span>
                        </div>

                        <div class="border-t border-gray-200 pt-4">
                            <div class="text-lg font-bold text-gray-800 mb-3 text-center" id="preview-budget">
                                25000 د.ع
                            </div>
                            <button class="block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300 text-center">
                                عرض مشروع مماثل
                            </button>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <h4 class="font-medium text-blue-800 mb-2">نصائح سريعة</h4>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li class="flex items-start">
                                <svg class="w-4 h-4 ml-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z" />
                                </svg>
                                <span>اكتب عنواناً واضحاً ومختصراً</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-4 h-4 ml-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z" />
                                </svg>
                                <span>أضف تفاصيل كافية عن المشروع</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-4 h-4 ml-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM15.657 5.757a1 1 0 00-1.414-1.414l-.707.707a1 1 0 001.414 1.414l.707-.707zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM5.05 6.464A1 1 0 106.464 5.05l-.707-.707a1 1 0 00-1.414 1.414l.707.707zM5 10a1 1 0 01-1 1H3a1 1 0 110-2h1a1 1 0 011 1zM8 16v-1h4v1a2 2 0 11-4 0zM12 14c.015-.34.208-.646.477-.859a4 4 0 10-4.954 0c.27.213.462.519.476.859h4.002z" />
                                </svg>
                                <span>حدد المهارات المطلوبة بدقة</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>
</html>
