@extends('main.layout.layout')
@section('main_content')

    <style>
        .dashboard-card {
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            transition: all 0.3s ease;
        }

        .dashboard-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .progress-bar {
            transition: width 1s ease-in-out;
        }

        .notification-badge {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .rating-stars {
            color: #fbbf24;
        }

        .quick-action-btn {
            transition: all 0.3s ease;
        }

        .quick-action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
        }

        @media (max-width: 768px) {
            .chart-container {
                height: 200px;
            }
        }
    </style>

    <!-- Header -->
    <div class="bg-gradient-to-r from-primary to-secondary text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div class="mb-4 md:mb-0">
                    <h1 class="text-3xl font-bold mb-2 animate-fade-in-up">مرحباً بك، {{ Auth::user()->name ?? 'محمد' }} 👋
                    </h1>
                    <p class="text-blue-100 animate-fade-in-up" style="animation-delay: 0.1s">لوحة التحكم الخاصة بك</p>
                </div>
                <div class="flex gap-3">
                    <a href="#"
                        class="quick-action-btn bg-white text-primary hover:bg-gray-100 font-bold py-2 px-4 rounded-lg inline-flex items-center gap-2 transition duration-300">
                        <i class="fas fa-search"></i>
                        تصفح المشاريع
                    </a>
                    <a href="#"
                        class="quick-action-btn bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-2 px-4 rounded-lg inline-flex items-center gap-2 transition duration-300">
                        <i class="fas fa-user-edit"></i>
                        تعديل الملف الشخصي
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- إحصائيات سريعة -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- إجمالي المشاريع -->
            <div class="dashboard-card bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">إجمالي المشاريع</p>
                        <h3 class="text-3xl font-bold text-gray-800">24</h3>
                        <p class="text-green-600 text-sm mt-2 flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i>
                            <span>+12% من الشهر الماضي</span>
                        </p>
                    </div>
                    <div class="stat-icon w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- إجمالي الأرباح -->
            <div class="dashboard-card bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">إجمالي الأرباح</p>
                        <h3 class="text-3xl font-bold text-gray-800">${{ $totalEarnings ?? '12,450' }}</h3>
                        <p class="text-green-600 text-sm mt-2 flex items-center gap-1">
                            <i class="fas fa-arrow-up"></i>
                            <span>+8% من الشهر الماضي</span>
                        </p>
                    </div>
                    <div class="stat-icon w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-dollar-sign text-green-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- التقييم العام -->
            <div class="dashboard-card bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.3s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">التقييم العام</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $averageRating ?? '4.8' }}</h3>
                        <div class="rating-stars mt-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <div class="stat-icon w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-star text-yellow-600 text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- المشاريع الجارية -->
            <div class="dashboard-card bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.4s">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm mb-1">المشاريع الجارية</p>
                        <h3 class="text-3xl font-bold text-gray-800">{{ $activeProjects ?? 5 }}</h3>
                        <p class="text-blue-600 text-sm mt-2 flex items-center gap-1">
                            <i class="fas fa-sync-alt"></i>
                            <span>قيد التنفيذ</span>
                        </p>
                    </div>
                    <div class="stat-icon w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-tasks text-purple-600 text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- الصف الثاني: الرسم البياني والإشعارات -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- الأرباح الشهرية -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">الأرباح الشهرية</h3>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg px-3 py-2">
                        <option>آخر 6 أشهر</option>
                        <option>آخر 3 أشهر</option>
                        <option>السنة الحالية</option>
                    </select>
                </div>
                <div class="chart-container">
                    <canvas id="earningsChart"></canvas>
                </div>
            </div>

            <!-- الإشعارات الأخيرة -->
            <div class="bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">الإشعارات</h3>
                    <span
                        class="notification-badge bg-red-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">3</span>
                </div>
                <div class="space-y-4 max-h-80 overflow-y-auto">
                    <div
                        class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition cursor-pointer">
                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-comment text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">رسالة جديدة من أحمد</p>
                            <p class="text-xs text-gray-600 mt-1">بخصوص مشروع تطوير الموقع</p>
                            <p class="text-xs text-gray-500 mt-1">منذ 5 دقائق</p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-3 p-3 bg-green-50 rounded-lg hover:bg-green-100 transition cursor-pointer">
                        <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-check text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">تم قبول عرضك</p>
                            <p class="text-xs text-gray-600 mt-1">مشروع تصميم شعار احترافي</p>
                            <p class="text-xs text-gray-500 mt-1">منذ ساعة</p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-3 p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100 transition cursor-pointer">
                        <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-star text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">تقييم جديد</p>
                            <p class="text-xs text-gray-600 mt-1">حصلت على 5 نجوم من سارة</p>
                            <p class="text-xs text-gray-500 mt-1">منذ 3 ساعات</p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-3 p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition cursor-pointer">
                        <div class="w-10 h-10 bg-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-dollar-sign text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">دفعة جديدة</p>
                            <p class="text-xs text-gray-600 mt-1">تم إضافة $500 إلى رصيدك</p>
                            <p class="text-xs text-gray-500 mt-1">منذ يوم</p>
                        </div>
                    </div>
                </div>
                <a href="#" class="block text-center text-primary hover:text-secondary font-semibold text-sm mt-4">
                    عرض جميع الإشعارات
                </a>
            </div>
        </div>

        <!-- المشاريع الأخيرة -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-800">المشاريع الأخيرة</h3>
                <a href="#" class="text-primary hover:text-secondary font-semibold text-sm">عرض الكل</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                المشروع</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                العميل</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                القيمة</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الحالة</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                التقدم</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @if ($freelancer)
                            @if($freelancer->projects && $freelancer->projects->count() > 0)
                            @foreach ($freelancer->projects as $project)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center ml-3">
                                                <i class="fas fa-code text-blue-600"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $project->title }}</div>
                                                <div class="text-xs text-gray-500">{{ $project->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $freelancer->user->name ?? 'عميل غير معروف' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-semibold text-gray-900">{{ number_format($project->budget_amount,0) }} دينار</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge status-active">
                                            <span class="w-2 h-2 bg-green-600 rounded-full"></span>
                                            جاري التنفيذ
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <div class="flex-1 bg-gray-200 rounded-full h-2">
                                                <div class="progress-bar bg-blue-600 h-2 rounded-full" style="width: 75%">
                                                </div>
                                            </div>
                                            <span class="text-xs text-gray-600">75%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-blue-600 hover:text-blue-800 ml-3">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="text-green-600 hover:text-green-800 ml-3">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button class="text-purple-600 hover:text-purple-800">
                                            <i class="fas fa-upload"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        @endif



                    </tbody>
                </table>
            </div>
        </div>

        <!-- الصف الأخير: المهارات والتقييمات -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- المهارات والخدمات -->
            <div class="bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.1s">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">مهاراتي وخدماتي</h3>
                    <a href="#" class="text-primary hover:text-secondary font-semibold text-sm">إدارة المهارات</a>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-code text-blue-600"></i>
                            </div>
                            <span class="text-gray-800 font-medium">تطوير المواقع</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-blue-600 h-2 rounded-full" style="width: 90%"></div>
                            </div>
                            <span class="text-xs text-gray-600 w-8">90%</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-mobile-alt text-green-600"></i>
                            </div>
                            <span class="text-gray-800 font-medium">تطوير تطبيقات الجوال</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-green-600 h-2 rounded-full" style="width: 85%"></div>
                            </div>
                            <span class="text-xs text-gray-600 w-8">85%</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-paint-brush text-purple-600"></i>
                            </div>
                            <span class="text-gray-800 font-medium">التصميم الجرافيكي</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-purple-600 h-2 rounded-full" style="width: 80%"></div>
                            </div>
                            <span class="text-xs text-gray-600 w-8">80%</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-pen-fancy text-yellow-600"></i>
                            </div>
                            <span class="text-gray-800 font-medium">كتابة المحتوى</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-600 h-2 rounded-full" style="width: 75%"></div>
                            </div>
                            <span class="text-xs text-gray-600 w-8">75%</span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-chart-line text-red-600"></i>
                            </div>
                            <span class="text-gray-800 font-medium">التسويق الرقمي</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="flex-1 w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-red-600 h-2 rounded-full" style="width: 70%"></div>
                            </div>
                            <span class="text-xs text-gray-600 w-8">70%</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- التقييمات الأخيرة -->
            <div class="bg-white rounded-xl shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.2s">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">التقييمات الأخيرة</h3>
                    <a href="#" class="text-primary hover:text-secondary font-semibold text-sm">عرض الكل</a>
                </div>
                <div class="space-y-4 max-h-80 overflow-y-auto">
                    <div class="border-b border-gray-100 pb-4">
                        <div class="flex items-start gap-3 mb-2">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                أ
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-semibold text-gray-800">أحمد محمد</h4>
                                    <div class="rating-stars text-sm">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">عمل ممتاز واحترافية عالية في التنفيذ. التسليم كان في الوقت
                                    المحدد والجودة فاقت التوقعات.</p>
                                <p class="text-xs text-gray-500 mt-2">منذ يومين</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-b border-gray-100 pb-4">
                        <div class="flex items-start gap-3 mb-2">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                س
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-semibold text-gray-800">سارة أحمد</h4>
                                    <div class="rating-stars text-sm">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">صاحب العمل الحر محترف جداً ومتعاون. سأعمل معه مرة أخرى
                                    بالتأكيد.</p>
                                <p class="text-xs text-gray-500 mt-2">منذ 3 أيام</p>
                            </div>
                        </div>
                    </div>

                    <div class="pb-4">
                        <div class="flex items-start gap-3 mb-2">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold flex-shrink-0">
                                م
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-semibold text-gray-800">محمد علي</h4>
                                    <div class="rating-stars text-sm">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600">عمل جيد، لكن كان يمكن أن يكون التواصل أفضل قليلاً.</p>
                                <p class="text-xs text-gray-500 mt-2">منذ أسبوع</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- احصائيات الأداء -->
        {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-md p-6 text-white animate-fade-in-up"
                style="animation-delay: 0.1s">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">معدل الإنجاز</h3>
                    <i class="fas fa-check-circle text-2xl opacity-80"></i>
                </div>
                <p class="text-3xl font-bold mb-2">96%</p>
                <p class="text-blue-100 text-sm">من المشاريع المكتملة بنجاح</p>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-md p-6 text-white animate-fade-in-up"
                style="animation-delay: 0.2s">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">معدل الرد</h3>
                    <i class="fas fa-comment-dots text-2xl opacity-80"></i>
                </div>
                <p class="text-3xl font-bold mb-2">2 ساعة</p>
                <p class="text-green-100 text-sm">متوسط وقت الرد على الرسائل</p>
            </div>

            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-md p-6 text-white animate-fade-in-up"
                style="animation-delay: 0.3s">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold">معدل التسليم</h3>
                    <i class="fas fa-clock text-2xl opacity-80"></i>
                </div>
                <p class="text-3xl font-bold mb-2">98%</p>
                <p class="text-purple-100 text-sm">التسليم في الوقت المحدد</p>
            </div>
        </div> --}}
    </div>

    <!-- مكتبة Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // رسم بياني للأرباح
        const ctx = document.getElementById('earningsChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'الأرباح ($)',
                        data: [1200, 1900, 1500, 2200, 2800, 2400],
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointRadius: 5,
                        pointHoverRadius: 7,
                        pointBackgroundColor: 'rgb(59, 130, 246)',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return '$' + context.parsed.y.toLocaleString();
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // تأثير تحريك شريط التقدم
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 100);
            });
        });
    </script>

@endsection
