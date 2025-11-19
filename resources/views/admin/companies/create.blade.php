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
                            <li class="breadcrumb-item active" aria-current="page">اضافة المجال</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <h2 class="mb-3 text-uppercase" dir="rtl">اضافة المجال</h2>

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('fields.store') }}" class="row g-3">
                            @csrf
                            <div class="col-md-4">
                                <label for="title" class="form-label">عنوان المجال المتاح</label>
                                <input type="text" class="form-control" id="title" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <label for="description" class="form-label">وصف المجال</label>
                                <textarea class="form-control" id="description" name="description" rows="2">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="icon-search">ابحث عن أيقونة</label>
                                <input type="text" id="icon-search" class="form-control" placeholder="ابحث...">

                                <!-- حقل مخفي لتخزين الأيقونة المختارة -->
                                <input type="hidden" name="icon" id="selected-icon" value="{{ old('icon') }}">

                                <div class="icons-grid mt-3 overflow-scroll" style="max-height: 300px;">
                                    @foreach ($icons as $icon)
                                        <div class="icon-item {{ old('icon') == $icon ? 'selected' : '' }}"
                                             data-icon="{{ $icon }}">
                                            <ion-icon name="{{ $icon }}"></ion-icon>
                                            <span class="icon-name">{{ $icon }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                @error('icon')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label class="form-label">اختر لون</label>

                                    <!-- حقل الإدخال المخفي لتخزين اللون المختار -->
                                    <input type="hidden" name="color" id="selected_color" value="{{ old('color') }}">

                                    <!-- شبكة عرض الألوان -->
                                    <div class="colors-grid border rounded p-3">
                                        <div class="row g-2" id="colors_container">
                                            @foreach ($colors as $color)
                                                <div class="col-2 col-sm-1 text-center color-item">
                                                    <div class="color-option p-2 border rounded cursor-pointer
                         {{ old('color') == $color ? 'selected' : '' }}"
                                                        data-color="{{ $color }}" title="{{ $color }}"
                                                        style="background-color: {{ $color }}; height: 40px;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    @error('color')
                                        <div class="text-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">حفظ</button>
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

            iconItems.forEach(item => {
                item.addEventListener('click', () => {
                    // إزالة التحديد من جميع الأيقونات
                    document.querySelectorAll('.icon-item').forEach(i => {
                        i.classList.remove('selected');
                    });
                    // تحديد الأيقونة المختارة
                    item.classList.add('selected');
                    // تعيين value للحقل المخفي
                    selectedIconInput.value = item.dataset.icon;
                });
            });

            // البحث في الأيقونات
            iconSearch.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();
                document.querySelectorAll('.icon-item').forEach(item => {
                    const iconName = item.querySelector('.icon-name').textContent.toLowerCase();
                    if (iconName.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // تحديد الأيقونة المختارة مسبقاً (في حالة وجود errors)
            const currentIcon = selectedIconInput.value;
            if (currentIcon) {
                const selectedIconItem = document.querySelector(`.icon-item[data-icon="${currentIcon}"]`);
                if (selectedIconItem) {
                    selectedIconItem.classList.add('selected');
                }
            }

            // كود الألوان
            const colorOptions = document.querySelectorAll('.color-option');
            const selectedColorInput = document.getElementById('selected_color');

            colorOptions.forEach(option => {
                option.addEventListener('click', function() {
                    // إزالة التحديد من جميع الألوان
                    colorOptions.forEach(color => {
                        color.classList.remove('selected');
                        color.style.border = '1px solid #dee2e6';
                    });

                    // تطبيق التحديد على اللون المختار
                    this.classList.add('selected');
                    this.style.border = '3px solid #000';

                    // تعيين قيمة الحقل المخفي
                    selectedColorInput.value = this.dataset.color;
                });
            });

            // تحديد اللون المختار مسبقاً (في حالة وجود errors)
            const currentColor = selectedColorInput.value;
            if (currentColor) {
                const selectedColor = document.querySelector(`.color-option[data-color="${currentColor}"]`);
                if (selectedColor) {
                    selectedColor.classList.add('selected');
                    selectedColor.style.border = '3px solid #000';
                }
            }
        });
    </script>

    <style>
        .icons-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 10px;
        }

        .icon-item {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .icon-item:hover {
            background-color: #f8f9fa;
            transform: scale(1.05);
        }

        .icon-item.selected {
            border-color: #007bff;
            background-color: #007bff;
            color: white;
        }

        .icon-item ion-icon {
            font-size: 24px;
        }

        .icon-name {
            display: block;
            font-size: 12px;
            margin-top: 5px;
        }

        .colors-grid {
            background-color: #f8f9fa;
        }

        .color-option {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .color-option:hover {
            transform: scale(1.05);
        }

        .color-option.selected {
            border: 3px solid #000 !important;
        }
    </style>
@endsection
