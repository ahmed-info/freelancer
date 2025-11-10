@extends('main.layout.layout')
@section('main_content')

<!-- قسم الهيدر -->
<section class="bg-white border-b border-gray-200 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="#" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-home"></i>
                </a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-gray-600 hover:text-primary">المستقلون</a>
            </div>
            <div class="flex items-center space-x-4 space-x-reverse">
                <a href="#" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-bell"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-primary">
                    <i class="fas fa-envelope"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- قسم البروفايل الرئيسي -->
<section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- العمود الأيسر -->
            <div class="md:w-1/3">
                <!-- صورة البروفايل -->
                <div class="bg-white rounded-lg shadow-sm p-6 text-center mb-6">
                    <div class="relative inline-block">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80"
                             alt="Andrew Alfy"
                             class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-lg">
                        <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Andrew Alfy</h1>
                    <p class="text-gray-600 mb-4">مطور واجهات أمامية | Frontend Developer</p>

                    <!-- التقييم -->
                    <div class="flex items-center justify-center mb-4">
                        <div class="flex text-yellow-400 ml-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-gray-700 font-bold">4.7</span>
                        <span class="text-gray-500 mx-2">|</span>
                        <span class="text-gray-600">(124 تقييم)</span>
                    </div>

                    <!-- معلومات الاتصال -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            <span>مصر</span>
                        </div>
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-clock ml-2"></i>
                            <span>مستقل منذ 2020</span>
                        </div>
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-check-circle text-green-500 ml-2"></i>
                            <span>الهوية موثقة</span>
                        </div>
                    </div>

                    <!-- الأزرار -->
                    <div class="space-y-3">
                        <button class="w-full bg-primary hover:bg-secondary text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                            <i class="fas fa-comment ml-2"></i>
                            مراسلة
                        </button>
                        <button class="w-full border border-primary text-primary hover:bg-blue-50 font-bold py-3 px-4 rounded-lg transition duration-300">
                            <i class="fas fa-briefcase ml-2"></i>
                            طلب خدمة
                        </button>
                    </div>
                </div>

                <!-- الإحصائيات -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h3 class="font-bold text-gray-800 mb-4">الإحصائيات</h3>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">معدل الاستجابة</span>
                            <span class="font-bold text-gray-800">98%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">سرعة الاستجابة</span>
                            <span class="font-bold text-gray-800">ساعتين</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">إنجاز المشاريع في الوقت</span>
                            <span class="font-bold text-gray-800">100%</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">إعادة التوظيف</span>
                            <span class="font-bold text-gray-800">87%</span>
                        </div>
                    </div>
                </div>

                <!-- المهارات -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="font-bold text-gray-800 mb-4">المهارات</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['HTML', 'CSS', 'JavaScript', 'React', 'Vue.js', 'Bootstrap', 'Tailwind CSS', 'jQuery'] as $skill)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">{{ $skill }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- العمود الأيمن -->
            <div class="md:w-2/3">
                <!-- التنقل -->
                @include('main.profile.partial')


                <!-- نبذة عني -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h3 class="font-bold text-gray-800 mb-4">نبذة عني</h3>
                    <p class="text-gray-700 leading-relaxed">
                        مطور واجهات أمامية بخبرة تزيد عن 5 سنوات في مجال تطوير الويب. متخصص في تطوير واجهات المستخدم باستخدام React.js و Vue.js. أحب العمل على مشاريع مبتكرة وأحرص على تقديم أعلى معايير الجودة في العمل.
                    </p>
                </div>

                <!-- الخدمات -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">الخدمات</h3>
                        <a href="#" class="text-primary hover:text-secondary text-sm">عرض الكل</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach([
                            ['title' => 'تطوير واجهة موقع إلكتروني', 'price' => '500', 'days' => '5'],
                            ['title' => 'تصميم متجاوب باستخدام Bootstrap', 'price' => '300', 'days' => '3'],
                            ['title' => 'تطوير تطبيق ويب باستخدام React', 'price' => '800', 'days' => '7'],
                            ['title' => 'تحسين أداء الموقع', 'price' => '200', 'days' => '2']
                        ] as $service)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                            <h4 class="font-bold text-gray-800 mb-2">{{ $service['title'] }}</h4>
                            <div class="flex justify-between items-center text-sm text-gray-600">
                                <span>يبدأ من ${{ $service['price'] }}</span>
                                <span>{{ $service['days'] }} أيام</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- المشاريع السابقة -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">المشاريع السابقة</h3>
                        <a href="#" class="text-primary hover:text-secondary text-sm">عرض الكل</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach([
                            ['title' => 'موقع تجارة إلكترونية', 'client' => 'شركة التقنية', 'price' => '1500', 'rating' => '5.0'],
                            ['title' => 'تطبيق إدارة المهام', 'client' => 'مؤسسة النجاح', 'price' => '1200', 'rating' => '4.8'],
                            ['title' => 'منصة تعليمية', 'client' => 'أكاديمية البرمجة', 'price' => '2000', 'rating' => '5.0'],
                            ['title' => 'موقع شركة سياحية', 'client' => 'شركة السياحة', 'price' => '800', 'rating' => '4.7']
                        ] as $project)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                            <h4 class="font-bold text-gray-800 mb-2">{{ $project['title'] }}</h4>
                            <p class="text-gray-600 text-sm mb-3">لـ {{ $project['client'] }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-primary font-bold">${{ $project['price'] }}</span>
                                <div class="flex items-center">
                                    <span class="text-yellow-400 ml-1">{{ $project['rating'] }}</span>
                                    <i class="fas fa-star text-yellow-400"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- التقييمات -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">التقييمات (124)</h3>
                        <div class="flex items-center">
                            <span class="text-2xl font-bold text-gray-800 ml-2">4.7</span>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        @foreach([
                            ['name' => 'أحمد محمد', 'comment' => 'عمل رائع ومتقن، التزم بالوقت وكان التواصل سلساً. أنصح بالتعامل معه', 'rating' => 5, 'date' => 'منذ شهر'],
                            ['name' => 'سارة عبدالله', 'comment' => 'مطور محترف، فهم المتطلبات بدقة وأنهى العمل قبل الوقت المحدد', 'rating' => 5, 'date' => 'منذ شهرين'],
                            ['name' => 'خالد السماري', 'comment' => 'تجربة جيدة، العمل كان متقناً ولكن تأخر قليلاً في التسليم', 'rating' => 4, 'date' => 'منذ 3 أشهر']
                        ] as $review)
                        <div class="border-b border-gray-200 pb-6 last:border-0">
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full ml-3"></div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">{{ $review['name'] }}</h4>
                                        <div class="flex text-yellow-400 text-sm">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star{{ $i > $review['rating'] ? ($i == $review['rating'] + 0.5 ? '-half-alt' : '') : '' }}"></i>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-sm">{{ $review['date'] }}</span>
                            </div>
                            <p class="text-gray-700">{{ $review['comment'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.gradient-bg {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.card-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.floating-shape {
    position: absolute;
    background: rgba(255,255,255,0.1);
    border-radius: 50%;
    animation: float 6s ease-in-out infinite;
}

.floating-shape:nth-child(1) {
    width: 200px;
    height: 200px;
    top: -100px;
    right: -100px;
    animation-delay: 0s;
}

.floating-shape:nth-child(2) {
    width: 150px;
    height: 150px;
    bottom: -75px;
    left: 20%;
    animation-delay: 2s;
}

.floating-shape:nth-child(3) {
    width: 100px;
    height: 100px;
    top: 20%;
    right: 20%;
    animation-delay: 4s;
}

@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(10deg); }
}

.animate-fade-in {
    animation: fadeIn 1s ease-in;
}

.animate-fade-in-up {
    animation: fadeInUp 1s ease-out;
}

.animate-slide-up {
    animation: slideUp 1s ease-out;
}

.animate-float {
    animation: float 3s ease-in-out infinite;
}

.animate-bounce-slow {
    animation: bounce 2s infinite;
}

.animate-pulse-glow {
    animation: pulseGlow 2s infinite;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
    }
    40% {
        transform: translateY(-10px);
    }
    60% {
        transform: translateY(-5px);
    }
}

@keyframes pulseGlow {
    0% {
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
    }
}

.service-icon {
    transition: transform 0.3s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.1) rotate(5deg);
}

.animate-wiggle {
    animation: wiggle 2s ease-in-out infinite;
}

@keyframes wiggle {
    0%, 7% {
        transform: rotateZ(0);
    }
    15% {
        transform: rotateZ(-15deg);
    }
    20% {
        transform: rotateZ(10deg);
    }
    25% {
        transform: rotateZ(-10deg);
    }
    30% {
        transform: rotateZ(6deg);
    }
    35% {
        transform: rotateZ(-4deg);
    }
    40%, 100% {
        transform: rotateZ(0);
    }
}

.animate-slide-in-left {
    animation: slideInLeft 0.8s ease-out;
}

.animate-slide-in-right {
    animation: slideInRight 0.8s ease-out;
}

@keyframes slideInLeft {
    from {
        opacity: 0;
        transform: translateX(-50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideInRight {
    from {
        opacity: 0;
        transform: translateX(50px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}
</style>

@endsection
