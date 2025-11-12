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
                <a href="{{ route('freelancers.index') }}" class="text-gray-600 hover:text-primary">صاحب عمل حر</a>
                <span class="text-gray-300">|</span>
                <a href="#" class="text-gray-600 hover:text-primary">{{ $freelancer->user->name }}</a>
                <span class="text-gray-300">|</span>
                <span class="text-primary">التقييمات</span>
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

                <!-- قسم التقييمات الرئيسي -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-2">التقييمات</h2>
                            <div class="flex items-center">
                                <div class="flex items-center ml-4">
                                    <span class="text-3xl font-bold text-gray-800 ml-2">4.7</span>
                                    <div class="flex flex-col">
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="text-gray-600 text-sm">124 تقييم</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- عوامل التصفية -->
                        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>جميع التقييمات</option>
                                <option>5 نجوم</option>
                                <option>4 نجوم</option>
                                <option>3 نجوم</option>
                                <option>2 نجوم</option>
                                <option>1 نجمة</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                <option>الترتيب حسب الأحدث</option>
                                <option>الترتيب حسب الأعلى تقييماً</option>
                                <option>الترتيب حسب الأقل تقييماً</option>
                            </select>
                        </div>
                    </div>

                    <!-- شريط توزيع التقييمات -->
                    <div class="bg-gray-50 rounded-lg p-6 mb-8">
                        <h3 class="font-bold text-gray-800 mb-4">توزيع التقييمات</h3>
                        <div class="space-y-3">
                            @foreach([
                                ['stars' => 5, 'count' => 89, 'percent' => 72],
                                ['stars' => 4, 'count' => 25, 'percent' => 20],
                                ['stars' => 3, 'count' => 7, 'percent' => 6],
                                ['stars' => 2, 'count' => 2, 'percent' => 2],
                                ['stars' => 1, 'count' => 1, 'percent' => 1]
                            ] as $rating)
                            <div class="flex items-center">
                                <div class="flex items-center w-20">
                                    <span class="text-gray-600 text-sm w-6">{{ $rating['stars'] }}</span>
                                    <i class="fas fa-star text-yellow-400 text-sm ml-1"></i>
                                </div>
                                <div class="flex-1 bg-gray-200 rounded-full h-2 ml-3">
                                    <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $rating['percent'] }}%"></div>
                                </div>
                                <span class="text-gray-600 text-sm w-12 text-left">{{ $rating['count'] }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- قائمة التقييمات -->
                    <div class="space-y-8">
                        <!-- تقييم 1 -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-4 flex-shrink-0">
                                        أ
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">أحمد محمد</h4>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400 text-sm">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm mr-2">منذ شهر</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-sm">مشروع: تطوير موقع تجارة إلكترونية</span>
                            </div>

                            <p class="text-gray-700 mb-4 leading-relaxed">
                                عمل رائع ومتقن، التزم بالوقت المحدد وكان التواصل سلساً ومستمراً. أنصح بالتعامل معه لأي مشروع تطوير واجهات. تعامل محترف واستجابة سريعة للطلبات.
                            </p>

                            <!-- تفاصيل المشروع -->
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-center text-sm text-gray-600">
                                    <span>ميزانية المشروع: <strong>$1,500</strong></span>
                                    <span>مدة التسليم: <strong>7 أيام</strong></span>
                                    <span>تم التسليم: <strong>قبل الموعد</strong></span>
                                </div>
                            </div>

                            <!-- التقييمات التفصيلية -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">جودة العمل</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">التسليم في الوقت</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">الالتزام بالمتطلبات</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">سرعة الاستجابة</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تقييم 2 -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-600 rounded-full flex items-center justify-center text-white font-bold ml-4 flex-shrink-0">
                                        س
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">سارة عبدالله</h4>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400 text-sm">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm mr-2">منذ شهرين</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-sm">مشروع: تصميم واجهة تطبيق جوال</span>
                            </div>

                            <p class="text-gray-700 mb-4 leading-relaxed">
                                مطور محترف جداً، فهم المتطلبات بدقة وأنهى العمل قبل الوقت المحدد. التصميم كان أنيقاً ووظيفياً. سأعمل معه مرة أخرى بالتأكيد.
                            </p>

                            <!-- تفاصيل المشروع -->
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-center text-sm text-gray-600">
                                    <span>ميزانية المشروع: <strong>$800</strong></span>
                                    <span>مدة التسليم: <strong>5 أيام</strong></span>
                                    <span>تم التسليم: <strong>قبل الموعد</strong></span>
                                </div>
                            </div>

                            <!-- التقييمات التفصيلية -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">جودة العمل</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">التسليم في الوقت</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">الالتزام بالمتطلبات</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">سرعة الاستجابة</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تقييم 3 -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold ml-4 flex-shrink-0">
                                        خ
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">خالد السماري</h4>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400 text-sm">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm mr-2">منذ 3 أشهر</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-sm">مشروع: تطوير لوحة تحكم</span>
                            </div>

                            <p class="text-gray-700 mb-4 leading-relaxed">
                                تجربة جيدة بشكل عام، العمل كان متقناً ولكن تأخر قليلاً في التسليم. التواصل كان جيداً وواضحاً خلال فترة العمل.
                            </p>

                            <!-- تفاصيل المشروع -->
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-center text-sm text-gray-600">
                                    <span>ميزانية المشروع: <strong>$1,200</strong></span>
                                    <span>مدة التسليم: <strong>10 أيام</strong></span>
                                    <span>تم التسليم: <strong>بعد يومين</strong></span>
                                </div>
                            </div>

                            <!-- التقييمات التفصيلية -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">جودة العمل</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">التسليم في الوقت</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">4.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">الالتزام بالمتطلبات</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">سرعة الاستجابة</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- تقييم 4 -->
                        <div class="border-b border-gray-200 pb-8">
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold ml-4 flex-shrink-0">
                                        م
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-gray-800">محمد العلي</h4>
                                        <div class="flex items-center mt-1">
                                            <div class="flex text-yellow-400 text-sm">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <span class="text-gray-500 text-sm mr-2">منذ 4 أشهر</span>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-gray-500 text-sm">مشروع: تطوير موقع شركة</span>
                            </div>

                            <p class="text-gray-700 mb-4 leading-relaxed">
                                مستقل محترف ومتميز. أنجز العمل بدقة عالية وكان متعاوناً في تنفيذ التعديلات الإضافية. سرعة الاستجابة كانت ممتازة.
                            </p>

                            <!-- تفاصيل المشروع -->
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <div class="flex justify-between items-center text-sm text-gray-600">
                                    <span>ميزانية المشروع: <strong>$600</strong></span>
                                    <span>مدة التسليم: <strong>5 أيام</strong></span>
                                    <span>تم التسليم: <strong>في الموعد</strong></span>
                                </div>
                            </div>

                            <!-- التقييمات التفصيلية -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">جودة العمل</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">4.5</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">التسليم في الوقت</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">الالتزام بالمتطلبات</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">سرعة الاستجابة</span>
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400 ml-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="text-gray-700 font-bold mr-2">5.0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- الترقيم -->
                    <div class="flex justify-center items-center space-x-2 space-x-reverse mt-8">
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-white font-bold">1</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">2</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">3</button>
                        <span class="text-gray-500">...</span>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">8</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </button>
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

/* تنسيقات إضافية للصفحة */
.breadcrumb {
    direction: rtl;
}

.rating-bar {
    transition: width 0.3s ease;
}

.review-card {
    transition: all 0.3s ease;
}

.review-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
</style>

@endsection
