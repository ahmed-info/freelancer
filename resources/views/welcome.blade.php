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
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate-fade-in-up">أكبر منصة عربية للعمل الحر</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-fade-in-up" style="animation-delay: 0.2s">حوّل مهاراتك إلى مشاريع حقيقية واربح من خلال العمل عبر الإنترنت مع آلاف العملاء العرب</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <a href="#" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">ابدأ كمستقل</a>
                        <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">انشر مشروعك</a>
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

    <!-- قسم كيف تعمل -->
    <section class="py-16 bg-white">
        <div class="bg-white">
            <div class="container mx-auto px-4 py-12">
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
                                    <p class="text-gray-600 leading-relaxed">أضف تفاصيل المشروع الذي تحتاج إنجازه والمهارات المطلوبة واحصل على عروض المستقلين المتخصصين في دقائق.</p>
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
                                    <h4 class="text-xl font-semibold text-gray-800 mb-2">اختر المستقل المناسب</h4>
                                    <p class="text-gray-600 leading-relaxed">قارن عروض المستقلين وتصفح ملفاتهم وتقيماتهم وأعمالهم، تفاوض معهم عبر الرسائل واختر الأفضل لتنفيذ مشروعك.</p>
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
                                    <p class="text-gray-600 leading-relaxed">سيعمل المستقل الذي اخترته على مشروعك ويتابع معك حتى حصولك على نتائج العمل المتفق عليه وتسليم المشروع.</p>
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
                        <div class="absolute -bottom-4 -left-4 w-8 h-8 bg-accent rounded-full pulse-dot"></div>
                    </div>
                </div>
                <div class="md:w-1/2 text-center md:text-right animate-slide-in-right">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4">انضم إلى مجتمع العمل الحر الأكبر عربياً</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto md:mr-0">سجّل الآن وابدأ رحلتك في عالم العمل الحر مع آلاف المستقلين العرب الناجحين</p>
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
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">ما يقوله المستقلون والعملاء عن تجربتهم مع منصة مستقل</p>
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
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى ملايين المستقلين العرب وابدأ في كسب المال من مهاراتك اليوم</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                <a href="#" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">سجل كمستقل</a>
                <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">انشر مشروعك</a>
            </div>
        </div>
    </section>
@endsection
