<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء مشروع جديد - منصة العمل الحر</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .floating-shape:nth-child(1) {
            width: 150px;
            height: 150px;
            top: 10%;
            right: 10%;
            animation-delay: 0s;
        }

        .floating-shape:nth-child(2) {
            width: 100px;
            height: 100px;
            top: 60%;
            right: 20%;
            animation-delay: 2s;
        }

        .floating-shape:nth-child(3) {
            width: 200px;
            height: 200px;
            bottom: 10%;
            left: 10%;
            animation-delay: 4s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .animate-slide-up {
            animation: slideUp 1s ease-out;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                transform: translateY(30px);
            }

            to {
                transform: translateY(0);
            }
        }

        .form-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 24px;
            margin-bottom: 24px;
        }

        .form-section-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e2e8f0;
        }

        .skill-tag {
            display: inline-flex;
            align-items: center;
            background: #edf2f7;
            border-radius: 20px;
            padding: 6px 12px;
            margin: 4px;
            font-size: 0.875rem;
        }

        .skill-tag i {
            margin-right: 6px;
            cursor: pointer;
            color: #718096;
        }

        .skill-tag i:hover {
            color: #e53e3e;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- الهيدر -->
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="#" class="text-2xl font-bold text-primary">مستقل</a>
                    <nav class="hidden md:flex space-x-8 space-x-reverse mr-8">
                        <a href="#" class="text-gray-700 hover:text-primary">المشاريع</a>
                        <a href="#" class="text-gray-700 hover:text-primary">فرصةون</a>
                        <a href="#" class="text-gray-700 hover:text-primary">الشركات</a>
                        <a href="#" class="text-gray-700 hover:text-primary">المدونة</a>
                    </nav>
                </div>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="#" class="text-gray-700 hover:text-primary">تسجيل الدخول</a>
                    <a href="#" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-lg">إنشاء
                        حساب</a>
                </div>
            </div>
        </div>
    </header>

    <!-- محتوى الصفحة -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">إنشاء مشروع جديد</h1>
            <p class="text-gray-600">أضف تفاصيل مشروعك لتبدأ في تلقي عروض من فرصةين الموهوبين</p>
        </div>

        <!-- نموذج إنشاء المشروع -->
        <form id="project-form" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- قسم عنوان المشروع -->
            <div class="form-section">
                <h2 class="form-section-title">عنوان المشروع</h2>
                <div class="mb-4">
                    <label for="project-title" class="block text-gray-700 mb-2">اكتب عنواناً واضحاً لمشروعك</label>
                    <input type="text" id="project-title" name="title"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                        placeholder="مثال: أريد تطوير موقع إلكتروني لمتجر إلكتروني">
                    <p class="text-sm text-gray-500 mt-1">يجب أن يكون العنوان وصفاً دقيقاً لمشروعك</p>
                </div>
            </div>

            <!-- قسم تفاصيل المشروع -->
            <div class="form-section">
                <h2 class="form-section-title">تفاصيل المشروع</h2>
                <div class="mb-4">
                    <label for="project-details" class="block text-gray-700 mb-2">صف مشروعك بالتفصيل</label>
                    <textarea id="project-details" name="description" rows="6"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                        placeholder="أدخل وصفاً مفصلاً لمشروعك، المهام المطلوبة، النتائج المتوقعة، وأي معلومات أخرى تساعد فرصةين على فهم متطلباتك"></textarea>
                    <p class="text-sm text-gray-500 mt-1">كلما كانت التفاصيل أكثر وضوحاً، زادت جودة العروض التي ستتلقاها
                    </p>
                </div>
            </div>

            <!-- قسم المهارات المطلوبة -->
            <div class="form-section">
                <h2 class="form-section-title">المهارات المطلوبة</h2>
                <div class="mb-4">
                    <label for="skills-input" class="block text-gray-700 mb-2">أضف المهارات المطلوبة لمشروعك</label>
                    <div class="flex">
                        <input type="text" id="skills-input" name="skills[]"
                            class="flex-grow px-4 py-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="مثال: تصميم واجهات، برمجة، تسويق إلكتروني">
                        <button type="button" id="add-skill"
                            class="bg-primary text-white px-4 py-3 rounded-r-lg hover:bg-secondary transition">إضافة</button>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">أضف المهارات الأساسية التي يجب أن يمتلكها فرصة لتنفيذ
                        مشروعك</p>
                </div>
                <div id="skills-container" class="flex flex-wrap mt-4">
                    <!-- ستظهر المهارات المضافة هنا -->
                </div>
            </div>

            <!-- قسم الميزانية -->
            <div class="form-section">
                <h2 class="form-section-title">الميزانية</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">نوع الميزانية</label>
                    <div class="flex space-x-4 space-x-reverse">
                        <label class="flex items-center">
                            <input type="radio" name="budget-type" value="fixed"
                                class="ml-2 text-primary focus:ring-primary" checked>
                            <span>مشروع بمبلغ محدد</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="budget-type" value="hourly"
                                class="ml-2 text-primary focus:ring-primary">
                            <span>مشروع بسعر الساعة</span>
                        </label>
                    </div>
                </div>
                <div id="fixed-budget" class="mb-4">
                    <label for="budget-amount" class="block text-gray-700 mb-2">الميزانية (بالدينار)</label>
                    <input type="number" id="budget-amount"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                        placeholder="مثال: 500">
                </div>
                <div id="hourly-budget" class="mb-4 hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="hourly-rate" class="block text-gray-700 mb-2">السعر للساعة (بالدينار)</label>
                            <input type="number" id="hourly-rate"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                placeholder="مثال: 2000">
                        </div>

                    </div>
                </div>
            </div>

            <!-- قسم المدة -->
            <div class="form-section">
                <h2 class="form-section-title">مدة المشروع</h2>
                <div class="mb-4">
                    <label for="project-duration" class="block text-gray-700 mb-2">المدة المتوقعة لإنجاز
                        المشروع</label>
                    <select id="project-duration"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="1">أقل من أسبوع</option>
                        <option value="2">أسبوع - أسبوعين</option>
                        <option value="3" selected>أسبوعين - شهر</option>
                        <option value="4">شهر - 3 أشهر</option>
                        <option value="5">أكثر من 3 أشهر</option>
                    </select>
                </div>
            </div>



            <!-- قسم رفع الملفات -->
            <div class="form-section">
                <h2 class="form-section-title">الملفات المرفقة (اختياري)</h2>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">أرفق ملفات تساعد في توضيح متطلبات المشروع</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-4xl mb-4"></i>
                        <p class="text-gray-600 mb-2">اسحب الملفات هنا أو انقر للرفع</p>
                        <p class="text-sm text-gray-500">الحد الأقصى لحجم الملف: 10MB</p>
                        <input type="file" name="file_attachments" id="file-upload" class="hidden" multiple>
                        <button type="button" id="upload-btn"
                            class="mt-4 bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition">اختيار
                            الملفات</button>
                    </div>
                    <div id="file-list" class="mt-4">
                        <!-- ستظهر قائمة الملفات المرفوعة هنا -->
                    </div>
                </div>
            </div>

            <!-- أزرار الإرسال -->
            <div class="flex justify-end space-x-4 space-x-reverse mt-8">
                <button type="button"
                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">حفظ
                    كمسودة</button>
                <button type="submit"
                    class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-secondary transition">نشر
                    المشروع</button>
            </div>
        </form>
    </div>

    <!-- الفوتر -->
    <footer class="bg-gray-800 text-white py-12 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">مستقل</h3>
                    <p class="text-gray-400">أكبر منصة عربية للعمل الحر توفر فرص عمل للمستقلين وتسهل على أصحاب المشاريع
                        إيجاد مستقلين محترفين.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">روابط سريعة</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">المشاريع</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">فرصةون</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">كيف تعمل</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">الأسعار</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">الدعم</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">مركز المساعدة</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">اتصل بنا</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">الشروط والأحكام</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">سياسة الخصوصية</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">تابعنا</h4>
                    <div class="flex space-x-4 space-x-reverse">
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2023 منصة مستقل. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <script>
        // إدارة المهارات
        document.getElementById('add-skill').addEventListener('click', function() {
            const skillInput = document.getElementById('skills-input');
            const skill = skillInput.value.trim();

            if (skill) {
                const skillsContainer = document.getElementById('skills-container');
                const skillTag = document.createElement('div');
                skillTag.className = 'skill-tag';
                skillTag.innerHTML = `
                    ${skill}
                    <i class="fas fa-times" onclick="this.parentElement.remove()"></i>
                `;
                skillsContainer.appendChild(skillTag);
                skillInput.value = '';
            }
        });

        // إدارة نوع الميزانية
        document.querySelectorAll('input[name="budget-type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const fixedBudget = document.getElementById('fixed-budget');
                const hourlyBudget = document.getElementById('hourly-budget');

                if (this.value === 'fixed') {
                    fixedBudget.classList.remove('hidden');
                    hourlyBudget.classList.add('hidden');
                } else {
                    fixedBudget.classList.add('hidden');
                    hourlyBudget.classList.remove('hidden');
                }
            });
        });

        // إدارة مستوى الخبرة
        document.querySelectorAll('input[name="experience-level"]').forEach(radio => {
            radio.addEventListener('change', function() {
                // إزالة التحديد من جميع العناصر
                document.querySelectorAll('label[for^="experience-"]').forEach(label => {
                    label.classList.remove('border-primary', 'bg-blue-50');
                });

                // إضافة التحديد للعنصر المختار
                this.parentElement.classList.add('border-primary', 'bg-blue-50');
            });
        });

        // إدارة رفع الملفات
        document.getElementById('upload-btn').addEventListener('click', function() {
            document.getElementById('file-upload').click();
        });

        document.getElementById('file-upload').addEventListener('change', function() {
            const fileList = document.getElementById('file-list');
            fileList.innerHTML = '';

            Array.from(this.files).forEach(file => {
                const fileItem = document.createElement('div');
                fileItem.className = 'flex items-center justify-between p-3 bg-gray-100 rounded-lg mb-2';
                fileItem.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-file text-gray-500 ml-3"></i>
                        <span>${file.name}</span>
                    </div>
                    <button type="button" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                fileList.appendChild(fileItem);
            });
        });

        // إرسال النموذج
        document.getElementById('project-form').addEventListener('submit', function(e) {
            e.preventDefault();
            // هنا يمكنك إضافة منطق إرسال النموذج
            alert('تم إنشاء المشروع بنجاح!');
        });
    </script>

    <script>
        // معالجة نموذج إنشاء المشروع
        document.addEventListener('DOMContentLoaded', function() {

            // ========== إدارة المهارات ==========
            const skillInput = document.getElementById('skills-input');
            const addSkillBtn = document.getElementById('add-skill');
            const skillsContainer = document.getElementById('skills-container');
            const skillsHiddenInput = document.createElement('input');
            skillsHiddenInput.type = 'hidden';
            skillsHiddenInput.name = 'skills[]';
            skillsHiddenInput.id = 'skills-hidden';
            document.getElementById('project-form').appendChild(skillsHiddenInput);

            let skills = [];

            // إضافة مهارة جديدة
            function addSkill() {
                const skill = skillInput.value.trim();

                if (!skill) {
                    showNotification('يرجى إدخال اسم المهارة', 'warning');
                    return;
                }

                if (skills.includes(skill)) {
                    showNotification('هذه المهارة موجودة بالفعل', 'warning');
                    return;
                }

                if (skills.length >= 10) {
                    showNotification('لا يمكن إضافة أكثر من 10 مهارات', 'warning');
                    return;
                }

                skills.push(skill);
                updateSkillsDisplay();
                updateSkillsInput();
                skillInput.value = '';
                skillInput.focus();
            }

            // عرض المهارات
            function updateSkillsDisplay() {
                skillsContainer.innerHTML = '';
                skills.forEach((skill, index) => {
                    const skillTag = document.createElement('div');
                    skillTag.className = 'skill-tag';
                    skillTag.setAttribute('data-index', index);

                    const skillText = document.createTextNode(skill + ' ');
                    const removeIcon = document.createElement('i');
                    removeIcon.className = 'fas fa-times mr-2';
                    removeIcon.style.cursor = 'pointer';
                    removeIcon.addEventListener('click', () => removeSkill(index));

                    skillTag.appendChild(skillText);
                    skillTag.appendChild(removeIcon);
                    skillsContainer.appendChild(skillTag);
                });
            }

            // تحديث الحقل المخفي للمهارات
            function updateSkillsInput() {
                skillsHiddenInput.value = JSON.stringify(skills);
            }

            // حذف مهارة
            window.removeSkill = function(index) {
                skills.splice(index, 1);
                updateSkillsDisplay();
                updateSkillsInput();
            };

            // الاستماع لزر الإضافة
            addSkillBtn.addEventListener('click', addSkill);

            // الاستماع لمفتاح Enter في حقل المهارات
            skillInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addSkill();
                }
            });



            // ========== إدارة رفع الملفات ==========
            const fileUpload = document.getElementById('file-upload');
            const uploadBtn = document.getElementById('upload-btn');
            const fileList = document.getElementById('file-list');
            let uploadedFiles = [];

            uploadBtn.addEventListener('click', function() {
                fileUpload.click();
            });

            fileUpload.addEventListener('change', function(e) {
                const files = Array.from(e.target.files);

                // التحقق من عدد الملفات
                if (uploadedFiles.length + files.length > 5) {
                    showNotification('لا يمكن رفع أكثر من 5 ملفات', 'warning');
                    return;
                }

                files.forEach(file => {
                    // التحقق من حجم الملف (10MB)
                    if (file.size > 10 * 1024 * 1024) {
                        showNotification(`الملف ${file.name} كبير جداً (الحد الأقصى 10MB)`,
                            'error');
                        return;
                    }

                    uploadedFiles.push(file);
                    addFileToList(file);
                });

                // إعادة تعيين input
                fileUpload.value = '';
            });

            function addFileToList(file) {
                const fileItem = document.createElement('div');
                fileItem.className = 'flex items-center justify-between p-3 bg-gray-100 rounded-lg mb-2';
                fileItem.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-file text-gray-500 ml-3"></i>
                <div>
                    <span class="block">${file.name}</span>
                    <span class="text-sm text-gray-500">${formatFileSize(file.size)}</span>
                </div>
            </div>
            <button type="button" class="text-red-500 hover:text-red-700" onclick="removeFile('${file.name}')">
                <i class="fas fa-times"></i>
            </button>
        `;
                fileList.appendChild(fileItem);
            }

            window.removeFile = function(fileName) {
                uploadedFiles = uploadedFiles.filter(f => f.name !== fileName);
                updateFileList();
            };

            function updateFileList() {
                fileList.innerHTML = '';
                uploadedFiles.forEach(file => addFileToList(file));
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
            }

            // ========== إرسال النموذج ==========
            const projectForm = document.getElementById('project-form');

            projectForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // التحقق من المهارات
                if (skills.length === 0) {
                    showNotification('يجب إضافة مهارة واحدة على الأقل', 'error');
                    skillInput.focus();
                    return;
                }

                // إنشاء FormData
                const formData = new FormData(projectForm);

                // إضافة المهارات
                skills.forEach(skill => {
                    formData.append('skills[]', skill);
                });

                // إضافة الملفات
                uploadedFiles.forEach((file, index) => {
                    formData.append(`attachments[${index}]`, file);
                });

                // تحديد نوع الإرسال (نشر أو حفظ كمسودة)
                const submitButton = e.submitter;
                if (submitButton && submitButton.textContent.includes('نشر')) {
                    formData.append('publish', '1');
                }

                // إرسال البيانات
                submitForm(formData);
            });

            async function submitForm(formData) {
                try {
                    // عرض مؤشر التحميل
                    showLoadingState();

                    const response = await fetch(projectForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });

                    const result = await response.json();

                    if (response.ok) {
                        showNotification(result.message || 'تم إنشاء المشروع بنجاح!', 'success');
                        setTimeout(() => {
                            window.location.href = result.redirect || '/projects';
                        }, 1500);
                    } else {
                        hideLoadingState();
                        if (result.errors) {
                            displayErrors(result.errors);
                        } else {
                            showNotification(result.message || 'حدث خطأ أثناء إنشاء المشروع', 'error');
                        }
                    }
                } catch (error) {
                    hideLoadingState();
                    showNotification('حدث خطأ في الاتصال بالخادم', 'error');
                    console.error('Error:', error);
                }
            }

            // ========== وظائف مساعدة ==========
            function showNotification(message, type = 'info') {
                // يمكنك استخدام مكتبة Toast أو إنشاء إشعار مخصص
                const notification = document.createElement('div');
                notification.className = `fixed top-4 left-1/2 transform -translate-x-1/2 z-50 px-6 py-3 rounded-lg shadow-lg ${
            type === 'success' ? 'bg-green-500' :
            type === 'error' ? 'bg-red-500' :
            type === 'warning' ? 'bg-yellow-500' :
            'bg-blue-500'
        } text-white`;
                notification.textContent = message;
                document.body.appendChild(notification);

                setTimeout(() => {
                    notification.remove();
                }, 3000);
            }

            function displayErrors(errors) {
                Object.keys(errors).forEach(key => {
                    const field = document.getElementById(key) || document.querySelector(`[name="${key}"]`);
                    if (field) {
                        const errorDiv = document.createElement('div');
                        errorDiv.className = 'text-red-500 text-sm mt-1';
                        errorDiv.textContent = errors[key][0];
                        field.parentElement.appendChild(errorDiv);
                    }
                });
            }

            function showLoadingState() {
                const submitBtn = projectForm.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin ml-2"></i> جاري الإنشاء...';
            }

            function hideLoadingState() {
                const submitBtn = projectForm.querySelector('button[type="submit"]');
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'نشر المشروع';
            }
        });
    </script>
</body>

</html>
