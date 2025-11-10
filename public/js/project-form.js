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

    // ========== إدارة نوع الميزانية ==========
    const budgetTypeRadios = document.querySelectorAll('input[name="budget-type"]');
    const fixedBudget = document.getElementById('fixed-budget');
    const hourlyBudget = document.getElementById('hourly-budget');

    budgetTypeRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'fixed') {
                fixedBudget.classList.remove('hidden');
                hourlyBudget.classList.add('hidden');
                // إزالة required من حقول الساعات
                document.getElementById('hourly-rate').removeAttribute('required');
                document.getElementById('weekly-hours').removeAttribute('required');
                // إضافة required لحقل الميزانية الثابتة
                document.getElementById('budget-amount').setAttribute('required', 'required');
            } else {
                fixedBudget.classList.add('hidden');
                hourlyBudget.classList.remove('hidden');
                // إزالة required من حقل الميزانية الثابتة
                document.getElementById('budget-amount').removeAttribute('required');
                // إضافة required لحقول الساعات
                document.getElementById('hourly-rate').setAttribute('required', 'required');
                document.getElementById('weekly-hours').setAttribute('required', 'required');
            }
        });
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
                showNotification(`الملف ${file.name} كبير جداً (الحد الأقصى 10MB)`, 'error');
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
