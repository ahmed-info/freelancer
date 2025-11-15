@extends('main.layout.layout')
@section('main_content')
    <!-- قسم الهيرو للشركات -->
    <section class="gradient-bg text-white py-20 md:py-28 relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate-fade-in-up">الحل الأمثل للشركات
                        لإنجاز المشاريع</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-fade-in-up" style="animation-delay: 0.2s">وظّف أفضل المواهب
                        العربية لإنجاز مشاريعك بجودة عالية وتكلفة مناسبة</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <a href="#register"
                            class="bg-white text-blue-600 hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">سجل
                            شركتك الآن</a>
                        <a href="#services"
                            class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-600 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">استعرض
                            الخدمات</a>
                    </div>
                </div>
                <div class="md:w-1/2 flex justify-center animate-slide-up">
                    <div class="relative">
                        <div class="bg-white rounded-2xl shadow-2xl p-6 w-80 transform animate-float">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-building text-white"></i>
                                </div>
                                <div class="mr-3">
                                    <h3 class="font-bold text-gray-800">شركة التقنية المتطورة</h3>
                                    <p class="text-gray-600 text-sm">50+ مشروع مكتمل</p>
                                </div>
                            </div>
                            <p class="text-gray-700 mb-4">"وفرنا أكثر من 40% من التكاليف باستخدام المنصة لإنجاز مشاريع
                                التطوير"</p>
                            <div class="flex justify-between text-sm text-gray-500">
                                <span><i class="fas fa-star text-yellow-400 ml-1"></i> 4.9/5</span>
                                <span><i class="fas fa-check-circle text-green-500 ml-1"></i> نشطة منذ 2020</span>
                            </div>
                        </div>
                        <div
                            class="absolute -top-4 -right-4 bg-green-500 text-white py-1 px-3 rounded-full text-sm font-bold animate-pulse">
                            شركة موثوقة
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم لماذا تختار منصتنا -->
    <section class="py-16 bg-white" id="services">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">لماذا تختار منصتنا لشركتك؟</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">نوفر لك بيئة
                    آمنة وفعالة للتواصل مع أفضل المواهب العربية</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-sm p-6 border border-blue-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">آلاف المواهب المؤهلة</h3>
                    <p class="text-gray-600">اختر من بين آلاف المستقلين المؤهلين في مختلف المجالات والتخصصات</p>
                </div>

                <div class="bg-gradient-to-br from-green-50 to-white rounded-xl shadow-sm p-6 border border-green-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.2s">
                    <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-briefcase text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">إدارة مشاريع مبسطة</h3>
                    <p class="text-gray-600">نوفر لك أدوات متكاملة لمتابعة وتقييم تقدم المشاريع بسهولة</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-white rounded-xl shadow-sm p-6 border border-purple-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">حماية وضمان حقوق</h3>
                    <p class="text-gray-600">نضمن لك الحصول على العمل المتفق عليه مع حماية حقوقك المالية</p>
                </div>

                <div class="bg-gradient-to-br from-orange-50 to-white rounded-xl shadow-sm p-6 border border-orange-100 card-hover animate-fade-in-up"
                    style="animation-delay: 0.4s">
                    <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-rocket text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">توفير في الوقت والتكلفة</h3>
                    <p class="text-gray-600">وفر وقتك ومالك مع نظام فعال يختصر عملية البحث والتعاقد</p>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم خطوات العمل -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">كيف تبدأ مع منصتنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">4 خطوات بسيطة
                    تفصلك عن إنجاز مشاريعك بأفضل المواهب</p>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-slide-in-left">
                    <div class="relative">
                        <div class="bg-white rounded-2xl shadow-lg p-6 w-full max-w-md mx-auto">
                            <div class="flex items-start mb-6">
                                <div
                                    class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse">
                                    1</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">سجل شركتك اومكتبك</h3>
                                    <p class="text-gray-600 mt-1">أنشئ حساب شركة وأكمل معلوماتك خلال دقائق</p>
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse"
                                    style="animation-delay: 0.2s">2</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">انشر مشروعك</h3>
                                    <p class="text-gray-600 mt-1">صف مشروعك بدقة وحدد الميزانية والمهارات المطلوبة</p>
                                </div>
                            </div>
                            <div class="flex items-start mb-6">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse"
                                    style="animation-delay: 0.4s">3</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">اختر مقدم الخدمة المناسب</h3>
                                    <p class="text-gray-600 mt-1">اطلع على العروض واختر مقدم الخدمة المناسب لمشروعك</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold ml-3 flex-shrink-0 animate-pulse"
                                    style="animation-delay: 0.6s">4</div>
                                <div>
                                    <h3 class="font-bold text-gray-800 text-lg">استلم مشروعك</h3>
                                    <p class="text-gray-600 mt-1">تابع التقدم واستلم المشروع النهائي مع ضمان الجودة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 text-center md:text-right animate-slide-in-right">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">انضم إلى آلاف الشركات الناجحة</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto md:mr-0">سجّل شركتك الآن وابدأ في إنجاز مشاريعك مع أفضل
                        المواهب العربية المؤهلة</p>
                    <a href="#register"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                        ابدأ الآن
                        <i class="fas fa-arrow-left mr-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم خدمات الشركات -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">خدمات مخصصة للشركات</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">نوفر حزمة
                    متكاملة من الخدمات المصممة خصيصًا لتلبية احتياجات شركتك</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div class="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mb-4 service-icon">
                        <i class="fas fa-code text-blue-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">تطوير البرمجيات</h3>
                    <p class="text-gray-600 mb-4">مطورون متميزون لتطوير تطبيقات ويب وجوال وأنظمة مخصصة</p>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            تطوير مواقع وتطبيقات
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            برمجة أنظمة مخصصة
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            تطوير حلول التجارة الإلكترونية
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.3s">
                    <div class="w-14 h-14 bg-green-100 rounded-lg flex items-center justify-center mb-4 service-icon">
                        <i class="fas fa-pen-nib text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">التصميم والإبداع</h3>
                    <p class="text-gray-600 mb-4">مصممون مبدعون لإنشاء هويات بصرية وتصاميم احترافية</p>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            تصميم الهويات البصرية
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            تصميم واجهات المستخدم
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            تصميم مواد تسويقية
                        </li>
                    </ul>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.5s">
                    <div class="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mb-4 service-icon">
                        <i class="fas fa-chart-line text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">التسويق والمحتوى</h3>
                    <p class="text-gray-600 mb-4">خبراء تسويق ومحتوى لتعزيز وجودك الرقمي وزيادة مبيعاتك</p>
                    <ul class="text-gray-600 space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            إدارة وسائل التواصل الاجتماعي
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            كتابة المحتوى وتحسين SEO
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 ml-2"></i>
                            إعلانات مدمجة وقياس النتائج
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الشركات الشريكة -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">الشركات التي تثق بنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى آلاف
                    الشركات الناجحة التي تستخدم منصتنا لإنجاز مشاريعها</p>
            </div>

            <div class="mb-16">
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12 lg:gap-16">
                    <div class="company-logo animate-fade-in-up" style="animation-delay: 0.1s">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-xl flex items-center justify-center p-4 shadow-md transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-blue-500 font-bold text-lg">شركة 1</span>
                        </div>
                    </div>
                    <div class="company-logo animate-fade-in-up" style="animation-delay: 0.2s">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-xl flex items-center justify-center p-4 shadow-md transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-green-500 font-bold text-lg">شركة 2</span>
                        </div>
                    </div>
                    <div class="company-logo animate-fade-in-up" style="animation-delay: 0.3s">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-xl flex items-center justify-center p-4 shadow-md transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-purple-500 font-bold text-lg">شركة 3</span>
                        </div>
                    </div>
                    <div class="company-logo animate-fade-in-up" style="animation-delay: 0.4s">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-xl flex items-center justify-center p-4 shadow-md transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-orange-500 font-bold text-lg">شركة 4</span>
                        </div>
                    </div>
                    <div class="company-logo animate-fade-in-up" style="animation-delay: 0.5s">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-xl flex items-center justify-center p-4 shadow-md transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-red-500 font-bold text-lg">شركة 5</span>
                        </div>
                    </div>
                    <div class="company-logo animate-fade-in-up" style="animation-delay: 0.6s">
                        <div
                            class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-xl flex items-center justify-center p-4 shadow-md transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-indigo-500 font-bold text-lg">شركة 6</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- إحصائيات الشركات -->
            <div class="bg-gradient-to-r from-blue-500 to-green-500 rounded-2xl p-8 text-white text-center">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div class="animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">+5,000</div>
                        <p class="text-blue-100">شركة عربية</p>
                    </div>
                    <div class="animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">+50,000</div>
                        <p class="text-blue-100">مشروع مكتمل</p>
                    </div>
                    <div class="animate-fade-in-up" style="animation-delay: 0.3s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">98%</div>
                        <p class="text-blue-100">رضا العملاء</p>
                    </div>
                    <div class="animate-fade-in-up" style="animation-delay: 0.4s">
                        <div class="text-3xl md:text-4xl font-bold mb-2">+$100M</div>
                        <p class="text-blue-100">معاملات مالية</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم آراء الشركات -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">آراء الشركات عن منصتنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">ما تقوله
                    الشركات عن تجربتها مع منصة العمل الحر</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 card-hover animate-fade-in-up"
                    style="animation-delay: 0.1s">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center text-white font-bold ml-3">
                            ت</div>
                        <div>
                            <h3 class="font-bold text-gray-800">شركة التقنية</h3>
                            <p class="text-gray-600 text-sm">شركة ناشئة</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"منصة العمل الحر غيرت طريقة عملنا بالكامل. وفرنا أكثر من 40% من تكاليف التطوير
                        وتمكنا من إنجاز مشاريعنا بجودة عالية."</p>
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
                            class="w-12 h-12 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center text-white font-bold ml-3">
                            إ</div>
                        <div>
                            <h3 class="font-bold text-gray-800">إبداع للتسويق</h3>
                            <p class="text-gray-600 text-sm">وكالة تسويق</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"بفضل المنصة، تمكنا من توسيع فريقنا بشكل مرن حسب احتياجات المشاريع. الخبرات
                        المتنوعة متاحة دائمًا عندما نحتاجها."</p>
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
                            class="w-12 h-12 bg-gradient-to-r from-blue-500 to-green-500 rounded-full flex items-center justify-center text-white font-bold ml-3">
                            د</div>
                        <div>
                            <h3 class="font-bold text-gray-800">ديجيتال سوليوشنز</h3>
                            <p class="text-gray-600 text-sm">شركة تطوير</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"نظام الحماية المالي وفر لنا راحة البال عند التعامل مع المستقلين. نعرف أن
                        أموالنا في أمان حتى استلام العمل."</p>
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

    <!-- قسم التسجيل -->
    <section class="py-16 gradient-bg text-white relative overflow-hidden" id="register">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in-up">جاهز لتعزيز فريقك بالمستقلين الموهوبين؟</h2>
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم
                إلى الشركات الرائدة وابدأ في إنجاز مشاريعك بكفاءة وجودة عالية</p>

            <div class="bg-white rounded-2xl shadow-2xl p-8 max-w-2xl mx-auto text-gray-800 animate-fade-in-up"
                style="animation-delay: 0.4s">
                <h3 class="text-2xl font-bold mb-6">سجل شركتك الآن</h3>

                @if (session('status'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="space-y-6 text-right" method="POST" action="{{ route('company.register') }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">اسم الشركة</label>
                            <input type="text" name="company_name"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="أدخل اسم الشركة">

                            @error('company_name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">مجال العمل</label>
                            <select name="business_field"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option>اختر مجال العمل</option>
                                @foreach ($fields as $field)
                                    <option value="{{ $field->id }}">{{ $field->name }}</option>
                                @endforeach
                                <option value="اخرى">أخرى</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">البريد الإلكتروني</label>
                            <input type="email" name="email"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ادخل البريد الإلكتروني">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2">رقم الهاتف</label>
                            <input type="tel" name="phone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ادخل رقم الهاتف">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2">كلمة المرور</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="ادخل كلمة المرور">
                        </div>

                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">وصف الشركة</label>
                        <textarea name="description"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            rows="3" placeholder="صف نشاط شركتك باختصار"></textarea>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="terms_accepted" id="terms"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 ml-2">
                        <label for="terms" class="text-gray-700">أوافق على <a href="#"
                                class="text-blue-600 hover:underline">الشروط والأحكام</a> و <a href="#"
                                class="text-blue-600 hover:underline">سياسة الخصوصية</a></label>
                    </div>



                    <button type="submit" id="showLoginModal"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                        سجل شركتك الآن
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
