@extends('main.layout.layout')
@section('main_content')

<style>
    .company-slider {
        position: relative;
        overflow: hidden;
        padding: 2rem 0;
    }

    .slider-container {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slide {
        min-width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
        padding: 0 3rem;
    }

    .company-item {
        flex: 0 0 auto;
    }

    .company-logo {
        transition: all 0.3s ease;
    }

    .company-logo:hover {
        transform: scale(1.1);
    }

    .slider-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255, 255, 255, 0.9);
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        z-index: 10;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        font-size: 18px;
        color: #3b82f6;
    }

    .slider-btn:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        transform: translateY(-50%) scale(1.1);
    }

    .slider-btn:active {
        transform: translateY(-50%) scale(0.95);
    }

    .prev-btn {
        right: 10px;
    }

    .next-btn {
        left: 10px;
    }

    .slider-dots {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
        gap: 0.75rem;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #d1d5db;
        cursor: pointer;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .dot:hover {
        background: #9ca3af;
        transform: scale(1.2);
    }

    .dot.active {
        background: #3b82f6;
        border-color: #93c5fd;
        transform: scale(1.3);
    }

    @media (max-width: 768px) {
        .slide {
            padding: 0 1rem;
            gap: 1rem;
        }

        .slider-btn {
            width: 35px;
            height: 35px;
            font-size: 14px;
        }
    }


</style>
 <!-- قسم الهيرو -->
    <section class="gradient-bg text-white py-16 md:py-24 relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate-fade-in-up">أكبر منصة عربية للعمل الحر</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-fade-in-up" style="animation-delay: 0.2s">حوّل مهاراتك إلى مشاريع حقيقية واربح من خلال العمل عبر الإنترنت مع آلاف العملاء العرب</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <a href="#" id="joinFreelancerBtn" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">ابدأ كمقدم خدمة</a>
                        <a href="{{ route('myprojects.create') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">انشر مشروعك</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center animate-slide-up">
                    <div class="relative rotate-3">
                        <div class="bg-white rounded-2xl shadow-2xl p-6 w-80 transform rotate-3 animate-float">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-accent rounded-full flex items-center justify-center">
                                    <i class="fas fa-code text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h3 class="font-bold text-gray-800">مشروع تطوير موقع إلكتروني</h3>
                                    <p class="text-gray-600 text-sm">ميزانية: $500 - $1,500</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4">أبحث عن مبرمج لتطوير موقع إلكتروني متكامل مع نظام إدارة محتوى وتصميم متجاوب.</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span><i class="fas fa-tag ml-1"></i> برمجة وتطوير</span>
                                <span><i class="far fa-clock ml-1"></i> 5 أيام متبقية</span>
                            </div>
                        </div>
                        <div class="absolute -top-4 -right-4 bg-accent text-white py-1 px-3 rounded-full text-sm font-bold animate-bounce-slow">
                            جاري التوظيف
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- قسم الشركات الجديد -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">الشركات الرائدة تثق بنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى آلاف الشركات التي تستخدم منصتنا لإنجاز مشاريعها بأعلى جودة</p>
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
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-sm p-6 border border-blue-100 card-hover animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">توظيف مستقلين متميزين</h3>
                    <p class="text-gray-600">اختر من بين آلاف المستقلين المؤهلين في مختلف المجالات والتخصصات</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white rounded-xl shadow-sm p-6 border border-green-100 card-hover animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-briefcase text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">إدارة مشاريع مبسطة</h3>
                    <p class="text-gray-600">نوفر لك أدوات متكاملة لمتابعة وتقييم تقدم المشاريع بسهولة</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl shadow-sm p-6 border border-purple-100 card-hover animate-fade-in-up" style="animation-delay: 0.5s">
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
                <h3 class="text-2xl font-bold text-gray-800 mb-4 animate-fade-in-up">جاهز لتعزيز فريقك بالمستقلين الموهوبين؟</h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى الشركات الرائدة وابدأ في إنجاز مشاريعك بكفاءة وجودة عالية</p>
                <a href="#" class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
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
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">أضف مشروع</h4>
                                    <p class="text-gray-600 leading-relaxed">أضف تفاصيل المشروع الذي تحتاج إنجازه والمهارات المطلوبة واحصل على عروض فرصةين المتخصصين في دقائق.</p>
                                </div>
                            </div>

                            <!-- عنصر 2 -->
                            <div class="flex gap-4 animate-slide-in-left" style="animation-delay: 0.3s">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">اختر فرصة المناسب</h4>
                                    <p class="text-gray-600 leading-relaxed">قارن عروض فرصةين وتصفح ملفاتهم وتقيماتهم وأعمالهم، تفاوض معهم عبر الرسائل واختر الأفضل لتنفيذ مشروعك.</p>
                                </div>
                            </div>

                            <!-- عنصر 3 -->
                            <div class="flex gap-4 animate-slide-in-left" style="animation-delay: 0.5s">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1412 734q0-28-18-46l-91-90q-19-19-45-19t-45 19l-408 407-226-226q-19-19-45-19t-45 19l-91 90q-18 18-18 46 0 27 18 45l362 362q19 19 45 19 27 0 46-19l543-543q18-18 18-45zm252 162q0 209-103 385.5t-279.5 279.5-385.5 103-385.5-103-279.5-279.5-103-385.5 103-385.5 279.5-279.5 385.5-103 385.5 103 279.5 279.5 103 385.5z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">استلم المشروع</h4>
                                    <p class="text-gray-600 leading-relaxed">سيعمل فرصة الذي اخترته على مشروعك ويتابع معك حتى حصولك على نتائج العمل المتفق عليه وتسليم المشروع.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- الفيديو -->
                    <div class="w-full lg:w-1/2 animate-slide-in-right">
                        <div class="relative aspect-w-16 aspect-h-9">
                            <div class="w-full h-64 md:h-80 lg:h-96 rounded-lg shadow-md overflow-hidden relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary opacity-20 animate-pulse"></div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="bg-white p-8 rounded-full shadow-lg animate-wiggle">
                                        <i class="fas fa-play text-primary text-3xl"></i>
                                    </div>
                                </div>
                                <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="فيديو توضيحي" class="w-full h-full object-cover">
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
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">منصة العمل الحر الرائدة في العالم العربي</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى مجتمع المليون مستقل عربي وابدأ رحلتك في العمل الحر</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">+1,000,000</h3>
                    <p class="text-gray-600">مستقل عربي مسجل</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-briefcase text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">+500,000</h3>
                    <p class="text-gray-600">مشروع مكتمل</p>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up" style="animation-delay: 0.5s">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-dollar-sign text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">+$200 مليون</h3>
                    <p class="text-gray-600">أرباح فرصةين</p>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم كيف تعمل -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">كيف تعمل منصة مستقل</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">خطوات بسيطة لبدء رحلتك في العمل الحر</p>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-slide-in-left">
                    <div class="relative">
                        <div class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-md mx-auto">
                            <div class="flex items-start mb-6">
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse">1</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">أنشئ حسابك</h3>
                                    <p class="text-gray-600 mt-1">سجل في المنصة خلال دقائق واملأ ملفك الشخصي</p>
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse" style="animation-delay: 0.2s">2</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">ابحث عن مشاريع</h3>
                                    <p class="text-gray-600 mt-1">تصفح المشاريع المتاحة وتقدم للمناسب منها</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse" style="animation-delay: 0.4s">3</div>
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
                    <p class="text-gray-600 mb-6 max-w-md mx-auto md:mr-0">سجّل الآن وابدأ رحلتك في عالم العمل الحر مع آلاف فرصةين العرب الناجحين</p>
                    <a href="#" class="bg-primary hover:bg-secondary text-white font-bold py-3 px-6 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                        سجل حسابك الآن
                        <i class="fas fa-arrow-left mr-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الخدمات -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">مجالات العمل المتاحة</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">اكتشف مجموعة واسعة من المجالات التي يمكنك العمل فيها كمستقل</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($fields as $field)
                    <div class="service-card bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4 service-icon">
                            <ion-icon name="{{ $field->icon }}"
                                                            style="font-size: 1.75rem; color: {{ $field->color }}"></ion-icon>
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $field->name }}</h3>
                        <p class="text-gray-600">{{ $field->description }}</p>
                    </div>
                @endforeach


            </div>
            <div class="text-center mt-10">
                <a href="#" class="text-primary hover:text-secondary font-bold inline-flex items-center animate-pulse">
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
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">ما يقوله فرصةون والعملاء عن تجربتهم مع منصة مستقل</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">م</div>
                        <div>
                            <h3 class="font-bold text-gray-800">محمد أحمد</h3>
                            <p class="text-gray-600 text-sm">مصمم جرافيك</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"منصة مستقل غيرت حياتي المهنية تماماً، الآن أعمل مع عملاء من مختلف الدول العربية وأكسب دخلاً ممتازاً من خلال مهاراتي."</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">س</div>
                        <div>
                            <h3 class="font-bold text-gray-800">سارة الخالد</h3>
                            <p class="text-gray-600 text-sm">مطورة ويب</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"بفضل مستقل، تمكنت من بناء مجموعة رائعة من العملاء الدائمين والتحول للعمل الحر بدوام كامل. أنصح الجميع بهذه المنصة."</p>
                    <div class="flex text-yellow-400 mt-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up" style="animation-delay: 0.5s">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">ي</div>
                        <div>
                            <h3 class="font-bold text-gray-800">ياسمين علي</h3>
                            <p class="text-gray-600 text-sm">كاتبة محتوى</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"كنت أبحث عن مصدر دخل إضافي، ومنصة مستقل وفرت لي الفرصة المثالية. الآن أكتب المحتوى لمشاريع متنوعة وأستمتع بعملي."</p>
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
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى ملايين فرصةين العرب وابدأ في كسب المال من مهاراتك اليوم</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                <a href="#" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">سجل كمستقل</a>
                <a href="{{ route('myprojects.create') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">انشر مشروعك</a>
            </div>
        </div>
    </section>

   <script>
(function() {
    // بيانات الشركات من قاعدة البيانات
    const companies = @json($companies ?? []);

    // إذا لم توجد شركات، لا نقوم بتنفيذ أي شيء
    if (!companies || companies.length === 0) {
        document.querySelector('.company-slider').style.display = 'none';
        return;
    }

    // العناصر
    const sliderContainer = document.getElementById('sliderContainer');
    const sliderDots = document.getElementById('sliderDots');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // المتغيرات
    let currentSlide = 0;
    let itemsPerSlide = getItemsPerSlide();
    let totalSlides = Math.ceil(companies.length / itemsPerSlide);
    let autoSlideInterval;

    // حساب عدد العناصر لكل شريحة
    function getItemsPerSlide() {
        const width = window.innerWidth;
        if (width >= 1024) return 6; // شاشات كبيرة
        if (width >= 768) return 4;  // شاشات متوسطة
        if (width >= 480) return 2;  // شاشات صغيرة
        return 1;                    // شاشات صغيرة جداً
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

        // إعادة حساب المتغيرات
        itemsPerSlide = getItemsPerSlide();
        totalSlides = Math.ceil(companies.length / itemsPerSlide);

        // إذا كان عدد الشركات أقل من itemsPerSlide، ضبط itemsPerSlide
        if (companies.length < itemsPerSlide) {
            itemsPerSlide = companies.length;
            totalSlides = 1;
        }

        console.log(`عدد الشركات: ${companies.length}, عناصر لكل شريحة: ${itemsPerSlide}, عدد الشرائح: ${totalSlides}`);

        // إنشاء كل شريحة
        for (let i = 0; i < totalSlides; i++) {
            const slide = document.createElement('div');
            slide.className = 'slide';

            // إضافة الشركات للشريحة
            const startIdx = i * itemsPerSlide;
            const endIdx = Math.min(startIdx + itemsPerSlide, companies.length);

            let slideHTML = '';
            for (let j = startIdx; j < endIdx; j++) {
                slideHTML += createCompanyHTML(companies[j], j - startIdx);
            }
            slide.innerHTML = slideHTML;
            sliderContainer.appendChild(slide);
        }

        // إنشاء نقاط التنقل فقط إذا كان هناك أكثر من شريحة
        if (totalSlides > 1) {
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('button');
                dot.className = `dot ${i === 0 ? 'active' : ''}`;
                dot.setAttribute('aria-label', `الانتقال إلى الشريحة ${i + 1}`);
                dot.addEventListener('click', () => goToSlide(i));
                sliderDots.appendChild(dot);
            }
        } else {
            // إخفاء الأزرار والنقاط إذا كان هناك شريحة واحدة فقط
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'none';
            sliderDots.style.display = 'none';
        }
    }

    // تحديث موضع السلايدر
    function updateSlider() {
        const offset = -currentSlide * 100;
        sliderContainer.style.transform = `translateX(${offset}%)`;

        // تحديث النقاط
        const dots = sliderDots.querySelectorAll('.dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });

        // تحديث حالة الأزرار
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

            // إعادة البناء فقط إذا تغير عدد العناصر في الشريحة
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

    function handleSwipe() {
        if (totalSlides <= 1) return;

        const swipeThreshold = 50;
        if (touchStartX - touchEndX > swipeThreshold) {
            nextSlide(); // سحب لليسار
        } else if (touchEndX - touchStartX > swipeThreshold) {
            prevSlide(); // سحب لليمين
        }
    }

    // التهيئة الأولية
    function init() {
        createSlides();
        updateSlider();
        startAutoSlide();
    }

    // الانتظار حتى تحميل الصفحة
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

@endsection
