@extends('admin.layout.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">فري لانسر</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">تعديل المشروع</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')
            </div>
            <!--end breadcrumb-->

            <h2 class="mb-3 text-uppercase" dir="rtl">تعديل المشروع</h2>

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('projects.update', $project) }}" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-3">
                                <label for="title" class="form-label">عنوان المشروع</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ old('title', $project->title) }}">
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="budget_amount" class="form-label">مبلغ المشروع</label>
                                <input type="number" class="form-control" id="budget_amount" name="budget_amount"
                                    value="{{ old('budget_amount', $project->budget_amount) }}">
                                @error('budget_amount')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="duration" class="form-label">مدة المشروع</label>
                                <input type="text" class="form-control" id="duration" name="duration"
                                    value="{{ old('duration', $project->duration) }}">
                                @error('duration')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="description" class="form-label">وصف المشروع</label>
                                <textarea class="form-control" id="description" name="description" rows="2">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="status" class="form-label">الحالة</label>
                                <select class="form-select" id="status" name="status">

                                    <option value="draft" {{ old('status', $project->status) == 'draft' ? 'selected' : '' }}>مسودة</option>
                                    <option value="published"
                                        {{ old('status', $project->status) == 'published' ? 'selected' : '' }}>منشور</option>
                                    <option value="in_progress"
                                        {{ old('status', $project->status) == 'in_progress' ? 'selected' : '' }}>قيد
                                        التنفيذ</option>
                                    <option value="completed"
                                        {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>مكتمل</option>
                                    <option value="cancelled"
                                        {{ old('status', $project->status) == 'cancelled' ? 'selected' : '' }}>الغاء</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>






                            <div class="col-12 mt-4">
                                <button class="btn btn-primary" type="submit">حفظ التعديلات</button>
                                <a href="{{ route('projects.index') }}" class="btn btn-secondary">إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // كود الأيقونات
            const iconItems = document.querySelectorAll('.icon-item');
            const selectedIconInput = document.getElementById('selected-icon');
            const iconSearch = document.getElementById('icon-search');
            const iconPreview = document.getElementById('icon-preview');
            const iconNamePreview = document.getElementById('icon-name-preview');
            const iconPreviewContainer = document.querySelector('.selected-icon-preview');

            // وظيفة تحديث معاينة الأيقونة
            function updateIconPreview(iconName) {
                if (iconName) {
                    iconPreview.setAttribute('name', iconName);
                    iconNamePreview.textContent = iconName;
                    iconPreviewContainer.style.display = 'block';
                } else {
                    iconPreviewContainer.style.display = 'none';
                }
            }

            // تحديد الأيقونات
            iconItems.forEach(item => {
                item.addEventListener('click', () => {
                    // إزالة التحديد من جميع الأيقونات
                    document.querySelectorAll('.icon-item').forEach(i => {
                        i.classList.remove('selected');
                    });

                    // تحديد الأيقونة المختارة
                    item.classList.add('selected');

                    // تعيين value للحقل المخفي
                    const selectedIcon = item.dataset.icon;
                    selectedIconInput.value = selectedIcon;

                    // تحديث المعاينة
                    updateIconPreview(selectedIcon);
                });
            });

            // البحث في الأيقونات
            iconSearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                document.querySelectorAll('.icon-item').forEach(item => {
                    const iconName = item.querySelector('.icon-name').textContent.toLowerCase();
                    if (iconName.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // تهيئة الأيقونة المختارة مسبقاً
            const currentIcon = selectedIconInput.value;
            if (currentIcon) {
                const selectedIconItem = document.querySelector(`.icon-item[data-icon="${currentIcon}"]`);
                if (selectedIconItem) {
                    selectedIconItem.classList.add('selected');
                    updateIconPreview(currentIcon);
                }
            }

            // كود الألوان
            const colorOptions = document.querySelectorAll('.color-option');
            const selectedColorInput = document.getElementById('selected_color');
            const colorPreviewContainer = document.querySelector('.selected-color-preview');
            const colorValuePreview = document.getElementById('color-value-preview');
            const colorPreviewBox = document.querySelector('.color-preview-box');

            // وظيفة تحديث معاينة اللون
            function updateColorPreview(color) {
                if (color) {
                    colorPreviewBox.style.backgroundColor = color;
                    colorValuePreview.textContent = color;
                    colorPreviewContainer.style.display = 'block';
                } else {
                    colorPreviewContainer.style.display = 'none';
                }
            }

            // تحديد الألوان
            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // إزالة التحديد من جميع الألوان
                    colorOptions.forEach(color => {
                        color.classList.remove('selected');
                        color.innerHTML = '';
                    });

                    // تطبيق التحديد على اللون المختار
                    this.classList.add('selected');
                    this.innerHTML = '<i class="bx bx-check text-white"></i>';

                    // تعيين قيمة الحقل المخفي
                    const selectedColor = this.dataset.color;
                    selectedColorInput.value = selectedColor;

                    // تحديث المعاينة
                    updateColorPreview(selectedColor);
                });
            });

            // تهيئة اللون المختار مسبقاً
            const currentColor = selectedColorInput.value;
            if (currentColor) {
                const selectedColor = document.querySelector(`.color-option[data-color="${currentColor}"]`);
                if (selectedColor) {
                    selectedColor.classList.add('selected');
                    selectedColor.innerHTML = '<i class="bx bx-check text-white"></i>';
                    updateColorPreview(currentColor);
                }
            }
        });
    </script>

    <style>
        .icons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 15px;
        }

        .icon-item {
            text-align: center;
            padding: 15px 10px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .icon-item:hover {
            background-color: #f8f9fa;
            border-color: #007bff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .icon-item.selected {
            border-color: #007bff;
            background-color: #007bff;
            color: white;
            box-shadow: 0 4px 12px rgba(0,123,255,0.3);
        }

        .icon-item ion-icon {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .icon-name {
            display: block;
            font-size: 12px;
            font-weight: 500;
            word-break: break-word;
        }

        .colors-grid {
            background-color: #f8f9fa;
        }

        .color-option {
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .color-option:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .color-option.selected {
            border: 3px solid #000 !important;
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        .selected-icon-preview, .selected-color-preview {
            transition: all 0.3s ease;
        }

        .color-preview-box {
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* تخصيص شريط التمرير */
        .icons-grid::-webkit-scrollbar {
            width: 8px;
        }

        .icons-grid::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .icons-grid::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .icons-grid::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
@endsection
