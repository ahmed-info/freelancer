@extends('main.layout.layout')
@section('main_content')
    <!-- قسم الهيرو -->
    <section class="gradient-bg text-white py-16 md:py-24 relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate-fade-in-up">أكبر منصة عربية للعمل
                        الحر</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-fade-in-up" style="animation-delay: 0.2s">حوّل مهاراتك إلى
                        مشاريع حقيقية واربح من خلال العمل عبر الإنترنت مع آلاف العملاء العرب</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        {{-- إذا كان مسجل دخول وصاحب مشروع --}}
                        @if(auth()->check() && auth()->user()->role == 'project')
                            <a href="{{ route('project.create') }}"
                                class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                                انشر مشروعك
                            </a>
                        @else
                            {{-- إذا لم يكن مسجل أو ليس صاحب مشروع --}}
                            <button id="loginProjectBtn"
                                class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                                انشر مشروعك
                            </button>
                        @endif
                        @if (auth()->check() && auth()->user()->role == 'freelance')
                            <a href="{{ route('freelancers.create') }}"
                                class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">
                                ابدأ كمقدم خدمة
                            </a>
                        @else
                            <a href="#" id="loginBtn"
                                class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">
                                ابدأ كمقدم خدمة
                            </a>
                        @endif
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center animate-slide-up">
                    {{-- محتوى اختياري --}}
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الشركات الجديد -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">الشركات الرائدة تثق بنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى آلاف
                    الشركات التي تستخدم منصتنا لإنجاز مشاريعها بأعلى جودة</p>
            </div>

            <!-- شعارات الشركات -->
            <div class="company-slider mb-16">
                <div class="slider-container" id="sliderContainer">
                    <!-- سيتم إضافة الشرائح ديناميكياً -->
                </div>

                <button class="slider-btn prev-btn" id="prevBtn">&#10094;</button>
                <button class="slider-btn next-btn" id="nextBtn">&#10095;</button>

                <div class="slider-dots" id="sliderDots">
                    <!-- سيتم إضافة النقاط ديناميكياً -->
                </div>
            </div>

            <!-- فوائد الشركات -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-sm p-6 border border-blue-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">توظيف مستقلين متميزين</h3>
                    <p class="text-gray-600">اختر من بين آلاف المستقلين المؤهلين في مختلف المجالات والتخصصات</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white rounded-xl shadow-sm p-6 border border-green-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-briefcase text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">إدارة مشاريع مبسطة</h3>
                    <p class="text-gray-600">نوفر لك أدوات متكاملة لمتابعة وتقييم تقدم المشاريع بسهولة</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl shadow-sm p-6 border border-purple-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.5s">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">حماية وضمان حقوق</h3>
                    <p class="text-gray-600">نضمن لك الحصول على العمل المتفق عليه مع حماية حقوقك المالية</p>
                </div>
            </div>

            <!-- إحصائيات الشركات -->
            <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white text-center">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">+5,000</div>
                        <p class="text-blue-100">شركة عربية</p>
                    </div>
                    <div class="animate-fade-in-up" style="animation-delay: 0.3s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">+50,000</div>
                        <p class="text-blue-100">مشروع مكتمل</p>
                    </div>
                    <div class="animate-fade-in-up" style="animation-delay: 0.5s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">98%</div>
                        <p class="text-blue-100">رضا العملاء</p>
                    </div>
                </div>
            </div>

            <!-- دعوة للعمل للشركات -->
            <div class="text-center mt-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-4 animate-fade-in-up">جاهز لتعزيز فريقك بالمستقلين الموهوبين؟
                </h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى
                    الشركات الرائدة وابدأ في إنجاز مشاريعك بكفاءة وجودة عالية</p>
                <a href="#"
                    class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                    سجل شركتك الآن
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- قسم كيف تعمل -->
    <section class="py-16 bg-white">
        <div class="bg-white">
            <div class="container mx-auto px-4 py-6">
                <!-- العنوان الرئيسي -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 animate-fade-in-up">هل لديك عمل تريد إنجازه</h2>
                </div>

                <div class="flex flex-col lg:flex-row gap-8 items-center">
                    <!-- القائمة المميزة -->
                    <div class="w-full lg:w-1/2">
                        <div class="space-y-8">
                            <!-- عنصر 1 -->
                            <div class="flex gap-4 animate-slide-in-left" style="animation-delay: 0.1s">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 1792 1792"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">أضف مشروع</h4>
                                    <p class="text-gray-600 leading-relaxed">أضف تفاصيل المشروع الذي تحتاج إنجازه والمهارات
                                        المطلوبة واحصل على عروض المتخصصين في دقائق.</p>
                                </div>
                            </div>

                            <!-- عنصر 2 -->
                            <div class="flex gap-4 animate-slide-in-left" style="animation-delay: 0.3s">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 1792 1792"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">اختر المناسب</h4>
                                    <p class="text-gray-600 leading-relaxed">قارن العروض وتصفح الملفات والتقييمات، تفاوض عبر الرسائل
                                        واختر الأفضل لتنفيذ مشروعك.</p>
                                </div>
                            </div>

                            <!-- عنصر 3 -->
                            <div class="flex gap-4 animate-slide-in-left" style="animation-delay: 0.5s">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 1792 1792"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">استلم المشروع</h4>
                                    <p class="text-gray-600 leading-relaxed">سيعمل المستقل على مشروعك ويتابع معك
                                        حتى حصولك على نتائج العمل المتفق عليه وتسليم المشروع.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- الفيديو -->
                    <div class="w-full lg:w-1/2 animate-slide-in-right">
                        <div class="relative aspect-w-16 aspect-h-9">
                            <div class="w-full h-64 md:h-80 lg:h-96 rounded-lg shadow-md overflow-hidden relative">
                                <div
                                    class="absolute inset-0 bg-gradient-to-r from-primary to-secondary opacity-20 animate-pulse">
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-white p-8 rounded-full shadow-lg animate-wiggle">
                                        <i class="fas fa-play text-primary text-3xl"></i>
                                    </div>
                                </div>
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"
                                    alt="فيديو توضيحي" class="w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الإحصائيات -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">منصة العمل الحر الرائدة في العالم
                    العربي</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى مجتمع
                    المليون مستقل عربي وابدأ رحلتك في العمل الحر</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">+1,000,000</h3>
                    <p class="text-gray-600">مستقل عربي مسجل</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">+500,000</h3>
                    <p class="text-gray-600">مشروع مكتمل</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up"
                    style="animation-delay: 0.5s">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-dollar-sign text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">+$200 مليون</h3>
                    <p class="text-gray-600">أرباح المستقلين</p>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم كيف تعمل -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">كيف تعمل منصة مستقل</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">خطوات بسيطة
                    لبدء رحلتك في العمل الحر</p>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-slide-in-left">
                    <div class="relative">
                        <div class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-md mx-auto">
                            <div class="flex items-start mb-6">
                                <div
                                    class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse">
                                    1</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">أنشئ حسابك</h3>
                                    <p class="text-gray-600 mt-1">سجل في المنصة خلال دقائق واملأ ملفك الشخصي</p>
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse"
                                    style="animation-delay: 0.2s">2</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">ابحث عن مشاريع</h3>
                                    <p class="text-gray-600 mt-1">تصفح المشاريع المتاحة وتقدم للمناسب منها</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse"
                                    style="animation-delay: 0.4s">3</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">ابدأ العمل وكسب المال</h3>
                                    <p class="text-gray-600 mt-1">انجز المشاريع واربح مع ضمان حقوقك المالية</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 text-center md:text-right animate-slide-in-right">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">انضم إلى مجتمع العمل الحر الأكبر عربياً</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto md:mr-0">سجّل الآن وابدأ رحلتك في عالم العمل الحر مع آلاف
                        المستقلين العرب الناجحين</p>
                    {{-- إذا كان مسجل دخول ومستقل --}}
                    @if(auth()->check() && auth()->user()->role == 'freelancer')
                        <a href="{{ route('freelancer.dashboard') }}"
                            class="bg-primary hover:bg-secondary text-white font-bold py-3 px-6 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                            اذهب إلى لوحتك
                            <i class="fas fa-arrow-left mr-2"></i>
                        </a>
                    @else
                        <a href="#" id="registerNowBtn"
                            class="bg-primary hover:bg-secondary text-white font-bold py-3 px-6 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                            سجل حسابك الآن
                            <i class="fas fa-arrow-left mr-2"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الخدمات -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">مجالات العمل المتاحة</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">اكتشف مجموعة
                    واسعة من المجالات التي يمكنك العمل فيها كمستقل</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($fields ?? [] as $field)
                    <div class="service-card bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                        style="animation-delay: 0.1s">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 service-icon">
                            <ion-icon name="{{ $field->icon ?? 'briefcase' }}"
                                style="font-size: 1.75rem; color: {{ $field->color ?? '#3b82f6' }}"></ion-icon>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $field->name ?? 'مجال' }}</h3>
                        <p class="text-gray-600">{{ $field->description ?? 'وصف المجال' }}</p>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-600">لا توجد مجالات متاحة حالياً</p>
                @endforelse
            </div>
            <div class="text-center mt-10">
                <a href="#"
                    class="text-primary hover:text-secondary font-bold inline-flex items-center animate-pulse">
                    استكشف جميع المجالات
                    <i class="fas fa-arrow-left mr-2 mt-1"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- قسم آراء العملاء -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">آراء عملائنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">ما يقوله
                    المستقلون والعملاء عن تجربتهم مع منصة مستقل</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">
                            م</div>
                        <div>
                            <h3 class="font-bold text-gray-800">محمد أحمد</h3>
                            <p class="text-gray-600 text-sm">مصمم جرافيك</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"منصة مستقل غيرت حياتي المهنية تماماً، الآن أعمل مع عملاء من مختلف الدول
                        العربية وأكسب دخلاً ممتازاً من خلال مهاراتي."</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">
                            س</div>
                        <div>
                            <h3 class="font-bold text-gray-800">سارة الخالد</h3>
                            <p class="text-gray-600 text-sm">مطورة ويب</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"بفضل مستقل، تمكنت من بناء مجموعة رائعة من العملاء الدائمين والتحول للعمل الحر
                        بدوام كامل. أنصح الجميع بهذه المنصة."</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.5s">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">
                            ي</div>
                        <div>
                            <h3 class="font-bold text-gray-800">ياسمين علي</h3>
                            <p class="text-gray-600 text-sm">كاتبة محتوى</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"كنت أبحث عن مصدر دخل إضافي، ومنصة مستقل وفرت لي الفرصة المثالية. الآن أكتب
                        المحتوى لمشاريع متنوعة وأستمتع بعملي."</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
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
            <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in-up">جاهز لبدء رحلتك في العمل الحر؟</h2>
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم
                إلى ملايين المستقلين العرب وابدأ في كسب المال من مهاراتك اليوم</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                {{-- زر التسجيل كصاحب عمل حر --}}
                @if(auth()->check() && auth()->user()->role == 'freelancer')
                    <a href="{{ route('freelancer.dashboard') }}"
                        class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">
                        لوحتك الشخصية
                    </a>
                @else
                    <a href="#" id="ctaRegisterBtn"
                        class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">
                        سجل كصاحب عمل حر
                    </a>
                @endif

                {{-- زر انشر المشروع --}}
                @if(auth()->check() && auth()->user()->role == 'project')
                    <a href="{{ route('project.create') }}"
                        class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                        انشر مشروعك الآن
                    </a>
                @else
                    <button id="ctaPublishBtn"
                        class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                        انشر مشروعك
                    </button>
                @endif
            </div>
        </div>
    </section>

    <!-- Modal تسجيل الدخول/التسجيل -->
    <div id="authModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-lg shadow-lg max-w-md w-full">
            <div class="flex justify-between items-center p-6 border-b">
                <h2 class="text-2xl font-bold" id="modalTitle">تسجيل دخول</h2>
                <button id="closeAuthModal" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>

            <form id="authForm" class="p-6 space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold mb-2">الاسم</label>
                    <input type="text" id="authName" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary"
                        placeholder="أدخل اسمك">
                </div>

                <div>
                    <label class="block text-gray-700 font-bold mb-2">البريد الإلكتروني أو رقم الهاتف</label>
                    <input type="text" name="credential" id="authEmail" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary"
                        placeholder="أدخل بريدك الإلكتروني أو رقم هاتفك">
                        @error('credential')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div id="passwordField" class="hidden">
                    <label class="block text-gray-700 font-bold mb-2">كلمة المرور</label>
                    <input type="password" id="authPassword" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-primary"
                        placeholder="أدخل كلمة المرور">
                </div>

                <button type="submit" class="w-full bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-secondary transition">
                    متابعة
                </button>

                <!-- رسالة ليس لديك حساب - تظهر فقط عند نشر المشروع -->
                <div id="noAccountMessage" class="hidden border-t pt-4 mt-4">
                    <p class="text-gray-600 text-center text-sm mb-3">
                        ليس لديك حساب؟
                    </p>
                    <a href="{{ route('register', ['role' => 'project']) }}"
                        class="block w-full bg-gradient-to-r from-primary to-secondary hover:opacity-90 text-white font-bold py-2 px-4 rounded-lg text-center transition duration-300">
                        أنشئ حساب الآن
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div id="registerProjectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white animate-fade-in">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-bold text-gray-900">ابدأ كصاحب مشروع</h3>
                <button id="closeRegisterModal" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-md">
                <p class="text-sm text-blue-800 text-right">
                    <i class="fas fa-info-circle ml-2"></i>
                    انضم كصاحب مشروع
                </p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="mt-4">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2 text-right">الاسم الكامل</label>
                    <input type="text" id="name" name="name" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                        placeholder="أدخل اسمك">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-right">البريد الالكتروني او رقم الهاتف</label>
                    <input type="text" id="email" name="credential" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                        placeholder="أدخل بريدك الإلكتروني أو رقم هاتفك">
                        @error('credential')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="relative mb-2">
                    <input type="hidden" name="role" id="role" value="project">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-right">كلمة المرور</label>
                    <input type="password" id="password" name="password" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                        placeholder="أدخل كلمة المرور">
                </div>

                <div class="flex items-center justify-between mb-4">
                    <a href="{{ route('password.request') }}"
                        class="inline-block align-baseline font-bold text-sm text-primary hover:text-secondary">
                        نسيت كلمة المرور؟
                    </a>
                    <div class="flex items-center">
                        <label class="flex items-center">
                            <span class="ml-2 text-sm text-gray-700">تذكرني</span>
                            <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-primary rounded">
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-3">
                    <button type="submit"
                        class="bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-300">
                        إنشاء حساب
                    </button>

                    <div class="text-center text-gray-600 text-sm">
                        هل لديك حساب؟
                        <a href="#" id="switchToLoginProject" class="text-primary hover:text-secondary font-bold">
                            سجل الدخول كصاحب مشروع
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- ====================================== Scripts ============================== --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/7.1.0/ionicons.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // عناصر الـ Modal
            const authModal = document.getElementById('authModal');
            const closeAuthModal = document.getElementById('closeAuthModal');
            const authForm = document.getElementById('authForm');

            // أزرار الفتح
            const publishProjectBtn = document.getElementById('publishProjectBtn');
            const startAsFreelancerBtn = document.getElementById('startAsFreelancerBtn');
            const registerNowBtn = document.getElementById('registerNowBtn');
            const ctaRegisterBtn = document.getElementById('ctaRegisterBtn');
            const ctaPublishBtn = document.getElementById('ctaPublishBtn');

            // دالة لفتح الـ Modal
            function openAuthModal(type) {
                const modalTitle = document.getElementById('modalTitle');
                const passwordField = document.getElementById('passwordField');
                const noAccountMessage = document.getElementById('noAccountMessage');

                if (type === 'freelancer') {
                    modalTitle.textContent = 'تسجيل كمستقل';
                    passwordField.classList.remove('hidden');
                    noAccountMessage.classList.add('hidden'); // إخفاء الرسالة
                } else if (type === 'project') {
                    modalTitle.textContent = 'انشر مشروعك';
                    passwordField.classList.add('hidden');
                    noAccountMessage.classList.remove('hidden'); // إظهار الرسالة
                }

                authModal.classList.remove('hidden');
            }

            // دالة لإغلاق الـ Modal
            function closeModalFunc() {
                authModal.classList.add('hidden');
                authForm.reset();
            }

            // أحداث الفتح
            if (publishProjectBtn) {
                publishProjectBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openAuthModal('project');
                });
            }

            if (startAsFreelancerBtn) {
                startAsFreelancerBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openAuthModal('freelancer');
                });
            }

            if (registerNowBtn) {
                registerNowBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openAuthModal('freelancer');
                });
            }

            if (ctaRegisterBtn) {
                ctaRegisterBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openAuthModal('freelancer');
                });
            }

            if (ctaPublishBtn) {
                ctaPublishBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openAuthModal('project');
                });
            }

            // أحداث الإغلاق
            closeAuthModal.addEventListener('click', closeModalFunc);

            authModal.addEventListener('click', (e) => {
                if (e.target === authModal) {
                    closeModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !authModal.classList.contains('hidden')) {
                    closeModalFunc();
                }
            });

            // معالجة النموذج
            authForm.addEventListener('submit', (e) => {
                e.preventDefault();
                console.log('تم إرسال النموذج');
                closeModalFunc();
            });
        });
    </script>

    <script>
        (function() {
            // بيانات الشركات من قاعدة البيانات
            const companies = @json($companies ?? []);

            // إذا لم توجد شركات، لا نقوم بتنفيذ أي شيء
            if (!companies || companies.length === 0) {
                const companySlider = document.querySelector('.company-slider');
                if (companySlider) {
                    companySlider.style.display = 'none';
                }
                return;
            }

            // العناصر
            const sliderContainer = document.getElementById('sliderContainer');
            const sliderDots = document.getElementById('sliderDots');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            if (!sliderContainer || !sliderDots || !prevBtn || !nextBtn) return;

            // المتغيرات
            let currentSlide = 0;
            let itemsPerSlide = getItemsPerSlide();
            let totalSlides = Math.ceil(companies.length / itemsPerSlide);
            let autoSlideInterval;

            // حساب عدد العناصر لكل شريحة
            function getItemsPerSlide() {
                const width = window.innerWidth;
                if (width >= 1024) return 6;
                if (width >= 768) return 4;
                if (width >= 480) return 2;
                return 1;
            }

            // إنشاء HTML لشركة واحدة
            function createCompanyHTML(company, index) {
                return `
                    <div class="company-item" style="animation: fadeInUp 0.5s ease forwards ${(index % itemsPerSlide) * 0.1}s; opacity: 0;">
                        <div class="text-center">
                            <div class="company-logo">
                                <div class="w-28 h-20 md:w-32 md:h-24 bg-white rounded-xl flex items-center justify-center p-4 shadow-md hover:shadow-xl transition-all duration-300">
                                    ${company.logo ?
                                        `<img src="${company.logo}" alt="${company.company_name}" class="max-w-full max-h-full object-contain">` :
                                        `<span class="text-gray-400 font-bold text-sm">${company.company_name}</span>`
                                    }
                                </div>
                            </div>
                            <p class="text-sm text-gray-600 mt-2 font-medium">${company.company_name}</p>
                        </div>
                    </div>
                `;
            }

            // إنشاء جميع الشرائح
            function createSlides() {
                sliderContainer.innerHTML = '';
                sliderDots.innerHTML = '';

                itemsPerSlide = getItemsPerSlide();
                totalSlides = Math.ceil(companies.length / itemsPerSlide);

                if (companies.length < itemsPerSlide) {
                    itemsPerSlide = companies.length;
                    totalSlides = 1;
                }

                for (let i = 0; i < totalSlides; i++) {
                    const slide = document.createElement('div');
                    slide.className = 'slide';

                    const startIdx = i * itemsPerSlide;
                    const endIdx = Math.min(startIdx + itemsPerSlide, companies.length);

                    let slideHTML = '';
                    for (let j = startIdx; j < endIdx; j++) {
                        slideHTML += createCompanyHTML(companies[j], j - startIdx);
                    }
                    slide.innerHTML = slideHTML;
                    sliderContainer.appendChild(slide);
                }

                if (totalSlides > 1) {
                    for (let i = 0; i < totalSlides; i++) {
                        const dot = document.createElement('button');
                        dot.className = `dot ${i === 0 ? 'active' : ''}`;
                        dot.setAttribute('aria-label', `الانتقال إلى الشريحة ${i + 1}`);
                        dot.addEventListener('click', () => goToSlide(i));
                        sliderDots.appendChild(dot);
                    }
                } else {
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                    sliderDots.style.display = 'none';
                }
            }

            // تحديث موضع السلايدر
            function updateSlider() {
                const offset = -currentSlide * 100;
                sliderContainer.style.transform = `translateX(${offset}%)`;

                const dots = sliderDots.querySelectorAll('.dot');
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });

                updateButtonStates();
            }

            // تحديث حالة الأزرار
            function updateButtonStates() {
                if (totalSlides <= 1) {
                    prevBtn.style.display = 'none';
                    nextBtn.style.display = 'none';
                    return;
                }

                prevBtn.style.display = 'flex';
                nextBtn.style.display = 'flex';
            }

            // الانتقال إلى شريحة معينة
            function goToSlide(index) {
                currentSlide = index;
                updateSlider();
                resetAutoSlide();
            }

            // الشريحة التالية
            function nextSlide() {
                if (totalSlides <= 1) return;
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
                resetAutoSlide();
            }

            // الشريحة السابقة
            function prevSlide() {
                if (totalSlides <= 1) return;
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateSlider();
                resetAutoSlide();
            }

            // بدء التشغيل التلقائي
            function startAutoSlide() {
                if (totalSlides <= 1) return;
                autoSlideInterval = setInterval(nextSlide, 4000);
            }

            // إيقاف وإعادة بدء التشغيل التلقائي
            function resetAutoSlide() {
                if (totalSlides <= 1) return;
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }

            // إعادة البناء عند تغيير حجم الشاشة
            let resizeTimeout;

            function handleResize() {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    const oldItemsPerSlide = itemsPerSlide;
                    itemsPerSlide = getItemsPerSlide();

                    if (oldItemsPerSlide !== itemsPerSlide) {
                        currentSlide = 0;
                        createSlides();
                        updateSlider();
                    }
                }, 250);
            }

            // إضافة مستمعي الأحداث
            prevBtn.addEventListener('click', prevSlide);
            nextBtn.addEventListener('click', nextSlide);
            window.addEventListener('resize', handleResize);

            // إيقاف التشغيل التلقائي عند التمرير
            const slider = document.querySelector('.company-slider');
            if (slider) {
                slider.addEventListener('mouseenter', () => {
                    if (autoSlideInterval) clearInterval(autoSlideInterval);
                });
                slider.addEventListener('mouseleave', startAutoSlide);

                // دعم اللمس للأجهزة المحمولة
                let touchStartX = 0;
                let touchEndX = 0;

                slider.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    if (autoSlideInterval) clearInterval(autoSlideInterval);
                });

                slider.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    handleSwipe();
                    startAutoSlide();
                });
            }

            function handleSwipe() {
                if (totalSlides <= 1) return;
                const swipeThreshold = 50;
                if (touchStartX - touchEndX > swipeThreshold) {
                    nextSlide();
                } else if (touchEndX - touchStartX > swipeThreshold) {
                    prevSlide();
                }
            }

            // التهيئة الأولية
            function init() {
                createSlides();
                updateSlider();
                startAutoSlide();
            }

            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }

            // إضافة CSS للأنيميشن
            const style = document.createElement('style');
            style.textContent = `
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
            `;
            document.head.appendChild(style);
        })();
    </script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // التحكم في القائمة المتنقلة
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // التحكم بالـ Modals
        const registerModal = document.getElementById('registerModal');
        const loginModal = document.getElementById('loginModal');

        // دوال لـ registerModal
        if (registerModal) {
            const joinFreelancerBtn = document.getElementById('joinFreelancerBtn');
            const joinFreelancerBtnMobile = document.getElementById('joinFreelancerBtnMobile');
            const closeRegisterModal = document.getElementById('closeRegisterModal');

            function openRegisterModal() {
                registerModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeRegisterModalFunc() {
                registerModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // فتح Modal عند الضغط على "انضم إلينا"
            if (joinFreelancerBtn) {
                joinFreelancerBtn.addEventListener('click', openRegisterModal);
            }

            if (joinFreelancerBtnMobile) {
                joinFreelancerBtnMobile.addEventListener('click', openRegisterModal);
            }

            // إغلاق Modal
            if (closeRegisterModal) {
                closeRegisterModal.addEventListener('click', closeRegisterModalFunc);
            }

            // إغلاق عند الضغط خارج المحتوى
            registerModal.addEventListener('click', (e) => {
                if (e.target === registerModal) {
                    closeRegisterModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !registerModal.classList.contains('hidden')) {
                    closeRegisterModalFunc();
                }
            });
        }

        // دوال لـ loginModal
        if (loginModal) {
            const loginBtn = document.getElementById('loginBtn');
            const loginBtnMobile = document.getElementById('loginBtnMobile');
            const closeLoginModal = document.getElementById('closeLoginModal');

            function openLoginModal() {
                loginModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeLoginModalFunc() {
                loginModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // فتح Modal عند الضغط على "تسجيل الدخول"
            if (loginBtn) {
                loginBtn.addEventListener('click', openLoginModal);
            }

            if (loginBtnMobile) {
                loginBtnMobile.addEventListener('click', openLoginModal);
            }

            // إغلاق Modal
            if (closeLoginModal) {
                closeLoginModal.addEventListener('click', closeLoginModalFunc);
            }

            // إغلاق عند الضغط خارج المحتوى
            loginModal.addEventListener('click', (e) => {
                if (e.target === loginModal) {
                    closeLoginModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !loginModal.classList.contains('hidden')) {
                    closeLoginModalFunc();
                }
            });
        }

        // التبديل بين الـ Modals
        const switchToLogin = document.getElementById('switchToLogin');
        const switchToRegister = document.getElementById('switchToRegister');

        if (switchToLogin) {
            switchToLogin.addEventListener('click', function(e) {
                e.preventDefault();
                if (registerModal) {
                    registerModal.classList.add('hidden');
                }
                if (loginModal) {
                    loginModal.classList.remove('hidden');
                }
            });
        }

        if (switchToRegister) {
            switchToRegister.addEventListener('click', function(e) {
                e.preventDefault();
                if (loginModal) {
                    loginModal.classList.add('hidden');
                }
                if (registerModal) {
                    registerModal.classList.remove('hidden');
                }
            });
        }
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // التحكم في القائمة المتنقلة
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // التحكم بالـ Modals
        const registerProjectModal = document.getElementById('registerProjectModal');
        const loginProjectModal = document.getElementById('loginProjectModal');

        // دوال لـ registerModal
        if (registerProjectModal) {
            const joinFreelancerBtn = document.getElementById('joinFreelancerBtn');
            const joinFreelancerBtnMobile = document.getElementById('joinFreelancerBtnMobile');
            console.log('registerProjectModal found');
            const closeRegisterModal = document.getElementById('closeRegisterModal');

            function openRegisterProjectModal() {
                registerProjectModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeRegisterProjectModalFunc() {
                registerProjectModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // فتح Modal عند الضغط على "انضم إلينا"
            if (joinFreelancerBtn) {
                console.log("fffffffffffffff")
                joinFreelancerBtn.addEventListener('click', openRegisterProjectModal);
            }

            if (joinFreelancerBtnMobile) {
                joinFreelancerBtnMobile.addEventListener('click', openRegisterProjectModal);
            }

            // إغلاق Modal
            if (closeRegisterModal) {
                console.log('closeRegisterModal found');
                closeRegisterModal.addEventListener('click', closeRegisterProjectModalFunc);
            }else {
                console.log('closeRegisterModal NOT found');
            }

            // إغلاق عند الضغط خارج المحتوى
            registerProjectModal.addEventListener('click', (e) => {
                if (registerProjectModal) {
                    closeRegisterProjectModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !registerProjectModal.classList.contains('hidden')) {
                    closeRegisterProjectModalFunc();
                }
            });
        }else {
            console.log('registerProjectModal NOT found');
        }

        // دوال لـ loginModal
        if (loginProjectModal) {
            const loginProjectBtn = document.getElementById('loginProjectBtn');
            const loginProjectBtnMobile = document.getElementById('loginProjectBtnMobile');
            const closeLoginProjectModal = document.getElementById('closeLoginProjectModal');

            function openLoginModal() {
                console.log("open login moadl")
                loginProjectModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeLoginProjectModalFunc() {
                                console.log("close login modal")

                loginProjectModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // فتح Modal عند الضغط على "تسجيل الدخول"
            if (loginProjectBtn) {
                loginProjectBtn.addEventListener('click', openLoginModal);
            }

            if (loginProjectBtnMobile) {
                loginProjectBtnMobile.addEventListener('click', openLoginModal);
            }

            // إغلاق Modal
            if (closeLoginProjectModal) {
                closeLoginProjectModal.addEventListener('click', closeLoginProjectModalFunc);
            }

            // إغلاق عند الضغط خارج المحتوى
            loginProjectModal.addEventListener('click', (e) => {
                if (e.target === loginProjectModal) {
                    closeLoginProjectModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !loginProjectModal.classList.contains('hidden')) {
                    closeLoginProjectModalFunc();
                }
            });
        }

        // التبديل بين الـ Modals
        const switchToLoginProject = document.getElementById('switchToLoginProject');
        const switchToRegisterProject = document.getElementById('switchToRegisterProject');

        if (switchToLoginProject) {
            switchToLoginProject.addEventListener('click', function(e) {
                e.preventDefault();
                if (registerProjectModal) {
                    registerProjectModal.classList.add('hidden');
                }
                if (loginProjectModal) {
                    loginProjectModal.classList.remove('hidden');
                }
            });
        }

        if (switchToRegisterProject) {

            switchToRegisterProject.addEventListener('click', function(e) {

                e.preventDefault();

                if (loginProjectModal) {

                    loginProjectModal.classList.add('hidden');

                }
                if (registerProjectModal) {
                    registerProjectModal.classList.remove('hidden');
                }
            });
        }
    });
</script>


@endsection
