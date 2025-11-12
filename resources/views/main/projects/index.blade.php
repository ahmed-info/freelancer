@extends('main.layout.layout')
@section('main_content')
<!-- قسم هيرو المشاريع -->
    <section class="gradient-bg text-white py-16 md:py-20 relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center animate-fade-in-up">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">استكشف المشاريع المتاحة</h1>
                <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto">ابحث عن مشاريع تناسب مهاراتك وابدأ في كسب المال من خلال العمل الحر</p>

                <!-- شريط البحث -->
                <form method="GET" action="{{ route('projects.main') }}" class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s">
                    <div class="flex">
                        <input type="text" name="search" placeholder="ابحث عن مشاريع في مجالك..."
                               class="w-full py-4 px-6 text-gray-800 focus:outline-none"
                               value="{{ request('search') }}">
                        <button type="submit" class="bg-primary hover:bg-secondary text-white px-6 transition duration-300">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

                <!-- التصنيفات السريعة -->
                <div class="flex flex-wrap justify-center mt-8 gap-2 animate-fade-in-up" style="animation-delay: 0.4s">
                    <a href="{{ request()->fullUrlWithQuery(['skill' => 'برمجة']) }}" class="bg-white/20 hover:bg-white/30 text-white py-2 px-4 rounded-full text-sm transition duration-300">برمجة وتطوير</a>
                    <a href="{{ request()->fullUrlWithQuery(['skill' => 'تصميم']) }}" class="bg-white/20 hover:bg-white/30 text-white py-2 px-4 rounded-full text-sm transition duration-300">تصميم</a>
                    <a href="{{ request()->fullUrlWithQuery(['skill' => 'تسويق']) }}" class="bg-white/20 hover:bg-white/30 text-white py-2 px-4 rounded-full text-sm transition duration-300">تسويق إلكتروني</a>
                    <a href="{{ request()->fullUrlWithQuery(['skill' => 'كتابة']) }}" class="bg-white/20 hover:bg-white/30 text-white py-2 px-4 rounded-full text-sm transition duration-300">كتابة وترجمة</a>
                    <a href="{{ request()->fullUrlWithQuery(['skill' => 'استشارات']) }}" class="bg-white/20 hover:bg-white/30 text-white py-2 px-4 rounded-full text-sm transition duration-300">استشارات أعمال</a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم تصفية المشاريع -->
    <section class="py-8 bg-gray-50 border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- عدد المشاريع -->
                <div class="mb-4 md:mb-0 animate-fade-in-up">
                    <h3 class="text-lg font-semibold text-gray-800">عرض <span class="text-primary">{{ $projects->count() }}</span> مشروع من أصل <span class="text-primary">{{ $projects->total() }}</span></h3>
                </div>

                <!-- خيارات التصفية -->
                <form method="GET" action="{{ route('projects.main') }}" id="filterForm" class="flex flex-wrap gap-4 animate-fade-in-up" style="animation-delay: 0.2s">
                    {{-- <!-- نوع المشروع -->
                    <div class="relative">
                        <select name="budget_type" class="appearance-none bg-white border border-gray-300 rounded-lg py-2 pl-4 pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent filter-select">
                            <option value="">نوع المشروع</option>
                            <option value="fixed" {{ request('budget_type') == 'fixed' ? 'selected' : '' }}>مشاريع ثابتة السعر</option>
                            <option value="hourly" {{ request('budget_type') == 'hourly' ? 'selected' : '' }}>مشاريع بسعر بالساعة</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div> --}}

                    <!-- الميزانية -->
                    <div class="relative">
                        <select name="budget_range" class="appearance-none bg-white border border-gray-300 rounded-lg py-2 pl-4 pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent filter-select">
                            <option value="">الميزانية</option>
                            <option value="0-25000" {{ request('budget_range') == '0-25000' ? 'selected' : '' }}>أقل من 25,000</option>
                            <option value="25000-100000" {{ request('budget_range') == '25000-100000' ? 'selected' : '' }}>25,000 - 100,000</option>
                            <option value="100000-250000" {{ request('budget_range') == '100000-250000' ? 'selected' : '' }}>100,000 - 250,000</option>
                            <option value="250000+" {{ request('budget_range') == '250000+' ? 'selected' : '' }}>أكثر من 250,000</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <!-- المدة -->
                    <div class="relative">
                        <select name="duration" class="appearance-none bg-white border border-gray-300 rounded-lg py-2 pl-4 pr-8 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent filter-select">
                            <option value="">المدة</option>
                            <option value="short" {{ request('duration') == 'short' ? 'selected' : '' }}>أقل من أسبوع</option>
                            <option value="medium" {{ request('duration') == 'medium' ? 'selected' : '' }}>أسبوع - شهر</option>
                            <option value="long" {{ request('duration') == 'long' ? 'selected' : '' }}>شهر - 3 أشهر</option>
                            <option value="very_long" {{ request('duration') == 'very_long' ? 'selected' : '' }}>أكثر من 3 أشهر</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>


                    <!-- زر إعادة التعيين -->
                    @if(request()->hasAny(['budget_type', 'budget_range', 'duration', 'experience', 'search', 'skill']))
                    <a href="{{ route('projects.main') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 inline-flex items-center">
                        <i class="fas fa-redo ml-2"></i>
                        إعادة التعيين
                    </a>
                    @endif
                </form>
            </div>
        </div>
    </section>

    <!-- قسم قائمة المشاريع -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- العمود الأيسر: قائمة المشاريع -->
                <div class="lg:col-span-2">
                    <!-- عناصر المشاريع -->
                    <div class="space-y-6">
                        @forelse ($projects as $project)
                            <div class="project-card bg-white rounded-xl shadow-sm p-6 animate-fade-in-up">
                                <div class="flex flex-col md:flex-row md:justify-between md:items-start">
                                    <div class="mb-4 md:mb-0">
                                        <div class="flex items-center mb-2">
                                            <h3 class="text-xl font-bold text-gray-800">{{ $project->title }}</h3>
                                            @if ($project->created_at->diffInDays(\Carbon\Carbon::now()) < 3)
                                            <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full">جديد</span>
                                            @endif
                                        </div>
                                        <p class="text-gray-600 mb-4">{{ $project->description }}</p>

                                        <div class="flex flex-wrap gap-2 mb-4">
                                            {{-- @foreach ($project->skills as $skill)
                                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full">{{ $skill }}</span>
                                            @endforeach --}}
                                        </div>

                                        <div class="flex items-center text-sm text-gray-500">

                                            <span class="flex items-center ml-4">
                                                <i class="far fa-clock ml-1"></i>
                                                {{ $project->created_at->diffForHumans()}}
                                            </span>

                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div class="text-left md:text-right">
                                            <div class="text-2xl font-bold text-gray-800 mb-2">{{ $project->budget_display }}</div>
                                           @if (json_decode($project->attachments) != null)
                                            @foreach (json_decode($project->attachments) as  $index => $attachmentPath)
                                                <a href="{{ asset($attachmentPath) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-300 inline-block mb-2">
                                                    عرض مشروع مماثل {{ $index + 1 }}
                                                </a>

                                            @endforeach
                                           @endif


                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <i class="fas fa-folder-open text-4xl text-gray-400 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-600">لا توجد مشاريع متاحة حالياً</h3>
                                <p class="text-gray-500 mt-2">يرجى المحاولة لاحقاً أو تعديل فلتر البحث</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- ترقيم الصفحات الديناميكي -->
                    @if($projects->hasPages())
                    <div class="flex justify-center mt-12 animate-fade-in-up" style="animation-delay: 0.5s">
                        <nav class="flex items-center space-x-2 space-x-reverse">
                            {{-- رابط الصفحة السابقة --}}
                            @if($projects->onFirstPage())
                                <span class="min-w-[40px] min-h-[40px] flex items-center justify-center text-gray-400 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @else
                                <a href="{{ $projects->previousPageUrl() }}" class="min-w-[40px] min-h-[40px] flex items-center justify-center text-gray-500 hover:bg-gray-100 rounded-lg transition duration-300">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @endif

                            {{-- روابط الصفحات --}}
                            @foreach($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                @if($page == $projects->currentPage())
                                    <span class="min-w-[40px] min-h-[40px] flex items-center justify-center bg-primary text-white rounded-lg transition duration-300 font-bold">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="min-w-[40px] min-h-[40px] flex items-center justify-center text-gray-700 hover:bg-gray-100 rounded-lg transition duration-300">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- رابط الصفحة التالية --}}
                            @if($projects->hasMorePages())
                                <a href="{{ $projects->nextPageUrl() }}" class="min-w-[40px] min-h-[40px] flex items-center justify-center text-gray-500 hover:bg-gray-100 rounded-lg transition duration-300">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @else
                                <span class="min-w-[40px] min-h-[40px] flex items-center justify-center text-gray-400 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @endif
                        </nav>
                    </div>
                    @endif
                </div>

                <!-- العمود الأيمن: نصائح وإعلانات -->
                <div class="lg:col-span-1">
                    <!-- بطاقة نصائح -->
                    <div class="bg-gradient-to-r from-primary to-secondary rounded-xl p-6 text-white mb-6 animate-fade-in-up" style="animation-delay: 0.4s">
                        <h3 class="text-xl font-bold mb-4">نصائح للفوز بالمشاريع</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle mt-1 ml-2 text-accent"></i>
                                <span>اقرأ متطلبات المشروع بعناية</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle mt-1 ml-2 text-accent"></i>
                                <span>قدم عرضاً مفصلاً ومخصصاً</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle mt-1 ml-2 text-accent"></i>
                                <span>أرفق نماذج من أعمالك السابقة</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle mt-1 ml-2 text-accent"></i>
                                <span>اطرح أسئلة ذكية توضح فهمك للمشروع</span>
                            </li>
                        </ul>
                    </div>

                    <!-- بطاقة إعلانية -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 mb-6 animate-fade-in-up" style="animation-delay: 0.5s">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">اربح المزيد من المشاريع</h3>
                        <p class="text-gray-600 mb-4">حساب "مستقل بلس" يزيد من فرصك في الفوز بالمشاريع بنسبة تصل إلى 40%</p>
                        <a href="#" class="bg-accent hover:bg-yellow-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 inline-block w-full text-center">
                            ترقية حسابك الآن
                        </a>
                    </div>

                    <!-- إحصائيات -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 animate-fade-in-up" style="animation-delay: 0.6s">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">إحصائيات سريعة</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">المشاريع المنشورة اليوم</span>
                                <span class="font-bold text-primary">47</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">متوسط الميزانية</span>
                                <span class="font-bold text-primary">$650</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">أعلى ميزانية هذا الأسبوع</span>
                                <span class="font-bold text-primary">$5,200</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">أكثر مجال مطلوب</span>
                                <span class="font-bold text-primary">برمجة وتطوير</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم CTA -->
    <section class="py-16 gradient-bg text-white relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in-up">لم تجد المشروع المناسب؟</h2>
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">يمكنك إنشاء تنبيه ليصلك إشعار عند نشر مشاريع جديدة تناسب مهاراتك</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                <a href="#" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">إنشاء تنبيه</a>
                <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">تصفح جميع المجالات</a>
            </div>
        </div>
    </section>

    <!-- JavaScript للفلترة التلقائية -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterSelects = document.querySelectorAll('.filter-select');

            filterSelects.forEach(select => {
                select.addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            });
        });
    </script>
@endsection
