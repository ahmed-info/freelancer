<div class="md:w-1/3">
                <!-- صورة البروفايل -->
                <div class="bg-white rounded-lg shadow-sm p-6 text-center mb-6">
                    <div class="relative inline-block">
                        <img src="{{ asset($freelancer->profile_image) }}"
                             alt="{{ $freelancer->user->name }}"
                             class="w-32 h-32 rounded-full mx-auto mb-4 object-cover border-4 border-white shadow-lg">
                        <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $freelancer->user->name }}</h1>
                    <p class="text-gray-600 mb-4">{{ $freelancer->title }}</p>

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
                        <span class="text-gray-600">({{ $freelancer->reviews_count }} تقييم)</span>
                    </div>

                    <!-- معلومات الاتصال -->
                    <div class="space-y-3 mb-6">
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-map-marker-alt ml-2"></i>
                            <span>{{ $freelancer->country }}</span>
                        </div>
                        <div class="flex items-center justify-center text-gray-600">
                            <i class="fas fa-clock ml-2"></i>
                            <span> تم انشاء الحساب منذ {{ $freelancer->created_at->year }}</span>
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
