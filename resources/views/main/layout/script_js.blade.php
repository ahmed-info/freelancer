<script>
        // تفعيل القائمة المتنقلة
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('open');
        });

        // تأثير التمرير السلس للروابط
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // إضافة تأثير الظهور عند التمرير
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in');
                    // إضافة تأثيرات مختلفة بناءً على نوع العنصر
                    if (entry.target.classList.contains('card-hover')) {
                        entry.target.style.animationDelay = Math.random() * 0.5 + 's';
                    }
                }
            });
        }, observerOptions);

        document.querySelectorAll('.card-hover, .animate-fade-in-up, .animate-slide-in-left, .animate-slide-in-right').forEach(el => {
            observer.observe(el);
        });

        // شريط التقدم
        window.addEventListener('scroll', function() {
            const winHeight = window.innerHeight;
            const docHeight = document.documentElement.scrollHeight;
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollPercent = (scrollTop / (docHeight - winHeight)) * 100;
            document.getElementById('progress-bar').style.width = scrollPercent + '%';

            // إظهار/إخفاء زر العودة للأعلى
            const scrollTopBtn = document.getElementById('scroll-top');
            if (scrollTop > 300) {
                scrollTopBtn.classList.add('show');
            } else {
                scrollTopBtn.classList.remove('show');
            }
        });

        // زر العودة للأعلى
        document.getElementById('scroll-top').addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // تأثيرات إضافية عند تحميل الصفحة
        window.addEventListener('load', function() {
            // إضافة تأثيرات للمحتوى الرئيسي
            document.querySelectorAll('.typewriter').forEach(el => {
                el.style.animation = 'typing 3.5s steps(40, end), blink-caret .75s step-end infinite';
            });
        });
    </script>


<script>
        document.addEventListener('DOMContentLoaded', function() {
            const skillsInput = document.getElementById('skills-input');
            const addSkillBtn = document.getElementById('add-skill');
            const skillsContainer = document.getElementById('skills-container');
            const hiddenSkillsFields = document.getElementById('hidden-skills-fields');
            const projectForm = document.getElementById('project-form');
            const fileUpload = document.getElementById('file-upload');
            const uploadBtn = document.getElementById('upload-btn');
            const fileList = document.getElementById('file-list');
            const dropZone = document.getElementById('drop-zone');
            const saveDraftBtn = document.getElementById('save-draft');

            let skills = [];
            let uploadedFiles = [];

            // إضافة مهارة جديدة
            function addSkill() {
                const skillValue = skillsInput.value.trim();

                if (skillValue && !skills.includes(skillValue)) {
                    skills.push(skillValue);
                    updateSkillsDisplay();
                    skillsInput.value = '';
                    skillsInput.focus();
                }
            }

            // إضافة مهارة بالضغط على Enter
            skillsInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    addSkill();
                }
            });

            // زر الإضافة
            addSkillBtn.addEventListener('click', addSkill);

            // تحديث عرض المهارات
            function updateSkillsDisplay() {
                skillsContainer.innerHTML = '';

                skills.forEach((skill, index) => {
                    const skillTag = document.createElement('div');
                    skillTag.className = 'skill-tag';
                    skillTag.innerHTML = `
                        ${skill}
                        <i class="fas fa-times" data-index="${index}"></i>
                    `;
                    skillsContainer.appendChild(skillTag);
                });

                // إضافة event listeners لأزرار الحذف
                document.querySelectorAll('.skill-tag i').forEach(icon => {
                    icon.addEventListener('click', function() {
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

            // إدارة الملفات
            uploadBtn.addEventListener('click', () => {
                fileUpload.click();
            });

            fileUpload.addEventListener('change', handleFileSelect);

            // دعم سحب وإفلات الملفات
            dropZone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropZone.classList.add('drag-over');
            });

            dropZone.addEventListener('dragleave', function() {
                dropZone.classList.remove('drag-over');
            });

            dropZone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropZone.classList.remove('drag-over');
                const files = e.dataTransfer.files;
                handleFiles(files);
            });

            function handleFileSelect(e) {
                const files = e.target.files;
                handleFiles(files);
            }

            function handleFiles(files) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    if (file.size > 10 * 1024 * 1024) {
                        alert(`حجم الملف ${file.name} يتجاوز 10MB`);
                        continue;
                    }
                    uploadedFiles.push(file);
                }
                updateFileList();
            }

            function updateFileList() {
                fileList.innerHTML = '';

                uploadedFiles.forEach((file, index) => {
                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-item';
                    fileItem.innerHTML = `
                        <div class="file-info">
                            <i class="fas fa-file file-icon"></i>
                            <div>
                                <div class="file-name">${file.name}</div>
                                <div class="file-size">${formatFileSize(file.size)}</div>
                            </div>
                        </div>
                        <div class="file-actions">
                            <button type="button" class="text-red-500 hover:text-red-700" onclick="removeFile(${index})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    `;
                    fileList.appendChild(fileItem);
                });
            }

            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            window.removeFile = function(index) {
                uploadedFiles.splice(index, 1);
                updateFileList();
            };

            // حفظ المسودة
            saveDraftBtn.addEventListener('click', function() {
                const formData = new FormData(projectForm);
                formData.append('is_draft', '1');

                // إضافة الملفات
                uploadedFiles.forEach(file => {
                    formData.append('attachments[]', file);
                });

                // هنا يمكنك إرسال البيانات لحفظ المسودة
                alert('تم حفظ المشروع كمسودة');
            });

            // التحقق قبل الإرسال
            projectForm.addEventListener('submit', function(e) {
                if (skills.length === 0) {
                    e.preventDefault();
                    alert('يرجى إضافة مهارة واحدة على الأقل');
                    skillsInput.focus();
                    return;
                }

                // إضافة الملفات إلى FormData قبل الإرسال
                const formData = new FormData(projectForm);
                uploadedFiles.forEach(file => {
                    formData.append('attachments[]', file);
                });

                updateHiddenSkillsField();
            });

            // منع إرسال النموذج عند الضغط على Enter في حقل المهارات
            skillsInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                }
            });
        });
    </script>
