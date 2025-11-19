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
                <a href="#" class="text-gray-600 hover:text-primary">صاحب عمل حر</a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-gray-600 hover:text-primary">{{ $freelancer->user->name }}</a>
                <span class="text-gray-300">|</span>
                <span class="text-primary">معرض الأعمال</span>
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
            @include('main.profile.sidebar')

            <!-- العمود الأيمن -->
            <div class="md:w-2/3">
                <!-- التنقل -->
                @include('main.profile.partial')


                <!-- عنوان ومعرض الأعمال -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">معرض الأعمال</h2>
                            <p class="text-gray-600">استعرض مجموعة من أبرز المشاريع التي قمت بتنفيذها</p>
                        </div>

                        <!-- عوامل التصفية -->
                        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>جميع الفئات</option>
                                <option>مواقع إلكترونية</option>
                                <option>تطبيقات ويب</option>
                                <option>تطبيقات جوال</option>
                                <option>تصاميم واجهات</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>الأحدث أولاً</option>
                                <option>الأقدم أولاً</option>
                                <option>الأكثر مشاهدة</option>
                            </select>
                        </div>
                    </div>

                    <!-- شبكة الأعمال -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- عمل  -->
                        @foreach($freelancer->projects as $project)
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300 group">
                            <div class="relative overflow-hidden">
                                <img src="{{ asset($project->image) }}"
                                     alt="موقع تجارة إلكترونية"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition duration-300 flex items-center justify-center">
                                    <div class="opacity-0 group-hover:opacity-100 transition duration-300 flex space-x-2 space-x-reverse">
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-expand"></i>
                                        </button>
                                        <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition duration-200">
                                            <i class="fas fa-link"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800 mb-2">{{ $project->title }}</h3>
                                <p class="text-gray-600 text-sm mb-3">{{ $project->description }}</p>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">React</span>
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Node.js</span>
                                    <span class="bg-purple-100 text-purple-800 text-xs px-2 py-1 rounded">MongoDB</span>
                                </div>
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span>{{$project->created_at->diffForHumans()}}</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-eye ml-1"></i>
                                        <span>{{ $project->views }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- الترقيم -->
                    <div class="flex justify-center items-center space-x-2 space-x-reverse mt-12">
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-white font-bold transition duration-200">1</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">2</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">3</button>
                        <span class="text-gray-500 px-2">...</span>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">8</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 transition duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    </div>
                </div>

                <!-- إحصائيات المشاريع -->
                <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white text-center mb-6">
                    <h3 class="text-2xl font-bold mb-6">إنجازاتي في الأرقام</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">+50</div>
                            <p class="text-blue-100">مشروع مكتمل</p>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">+35</div>
                            <p class="text-blue-100">عميل راضٍ</p>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">98%</div>
                            <p class="text-blue-100">معدل الرضا</p>
                        </div>
                        <div>
                            <div class="text-3xl md:text-4xl font-bold mb-2">3+</div>
                            <p class="text-blue-100">سنوات خبرة</p>
                        </div>
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

/* تنسيقات إضافية لمعرض الأعمال */
.portfolio-item {
    transition: all 0.3s ease;
}

.portfolio-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

.portfolio-image {
    transition: transform 0.3s ease;
}

.portfolio-item:hover .portfolio-image {
    transform: scale(1.05);
}

.portfolio-overlay {
    transition: all 0.3s ease;
}

.portfolio-item:hover .portfolio-overlay {
    background: rgba(0,0,0,0.3);
}

.portfolio-actions {
    opacity: 0;
    transition: opacity 0.3s ease;
}

.portfolio-item:hover .portfolio-actions {
    opacity: 1;
}

.tech-tag {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
}
</style>

@endsection
