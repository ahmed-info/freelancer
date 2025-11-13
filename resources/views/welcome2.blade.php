@extends('main.layout.layout')
@section('main_content')
 <!-- قسم الهيرو -->
    <section class="gradient-bg text-white py-16 md:py-24 relative overflow-hidden">
        <!-- المحتوى الحالي للهيرو -->
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate-fade-in-up">أكبر منصة عربية للعمل الحر</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-fade-in-up" style="animation-delay: 0.2s">حوّل مهاراتك إلى مشاريع حقيقية واربح من خلال العمل عبر الإنترنت مع آلاف العملاء العرب</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <a href="#" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">ابدأ كمقدم خدمة</a>
                        <a href="{{ route('project.create') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">انشر مشروعك</a>
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
        <!-- المحتوى الحالي لقسم كيف تعمل -->
    </section>

    <!-- قسم الإحصائيات -->
    <section class="py-16 bg-gray-50">
        <!-- المحتوى الحالي لقسم الإحصائيات -->
    </section>

    <!-- قسم كيف تعمل -->
    <section class="py-16 bg-white">
        <!-- المحتوى الحالي لقسم كيف تعمل -->
    </section>

    <!-- قسم الخدمات -->
    <section class="py-16 bg-gray-50">
        <!-- المحتوى الحالي لقسم الخدمات -->
    </section>

    <!-- قسم الشركات الجديد -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">الشركات الرائدة تثق بنا</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى آلاف الشركات التي تستخدم منصتنا لإنجاز مشاريعها بأعلى جودة</p>
            </div>

            <!-- شعارات الشركات -->
            <div class="mb-16">
                <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12 lg:gap-16">
                    @foreach([1,2,3,4,5,6] as $company)
                    <div class="company-logo animate-fade-in-up" style="animation-delay: {{ $company * 0.1 }}s">
                        <div class="w-24 h-24 md:w-32 md:h-32 bg-gray-100 rounded-xl flex items-center justify-center p-4 transition-all duration-300 hover:shadow-lg hover:scale-110">
                            <span class="text-gray-400 font-bold text-lg">شعار {{ $company }}</span>
                        </div>
                    </div>
                    @endforeach
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

    <!-- قسم آراء العملاء -->
    <section class="py-16">
        <!-- المحتوى الحالي لقسم آراء العملاء -->
    </section>

    <!-- قسم CTA -->
    <section class="py-16 gradient-bg text-white relative overflow-hidden">
        <!-- المحتوى الحالي لقسم CTA -->
    </section>
@endsection

<style>
.company-logo {
    filter: grayscale(100%);
    opacity: 0.7;
    transition: all 0.3s ease;
}

.company-logo:hover {
    filter: grayscale(0%);
    opacity: 1;
}

.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>
