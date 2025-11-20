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
                    <span id="averageRating" class="text-3xl font-bold text-gray-800 ml-2">
                        {{ number_format($averageRating, 1) }}
                    </span>
                    <div class="flex flex-col">
                        <div id="starsContainer" class="flex text-yellow-400">
                            @php
                                $average = $averageRating;
                                $fullStars = floor($average);
                                $decimal = $average - $fullStars;

                                if ($decimal >= 0.8) {
                                    $fullStars++;
                                    $halfStar = false;
                                } elseif ($decimal >= 0.2) {
                                    $halfStar = true;
                                } else {
                                    $halfStar = false;
                                }

                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                            @endphp

                            @for ($i = 0; $i < $fullStars; $i++)
                                <i class="fas fa-star"></i>
                            @endfor

                            @if ($halfStar)
                                <i class="fas fa-star-half-alt" style="transform: scaleX(-1);"></i>
                            @endif

                            @for ($i = 0; $i < $emptyStars; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                        <span id="ratingsCount" class="text-gray-600 text-sm">{{ $ratingsCount }} تقييم</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- عوامل التصفية -->
        <div class="flex flex-wrap gap-3 mt-4 lg:mt-0">
            <select id="ratingFilter" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="all" {{ $ratingFilter == 'all' ? 'selected' : '' }}>جميع التقييمات</option>
                <option value="5" {{ $ratingFilter == '5' ? 'selected' : '' }}>5 نجوم</option>
                <option value="4" {{ $ratingFilter == '4' ? 'selected' : '' }}>4 نجوم</option>
                <option value="3" {{ $ratingFilter == '3' ? 'selected' : '' }}>3 نجوم</option>
                <option value="2" {{ $ratingFilter == '2' ? 'selected' : '' }}>2 نجوم</option>
                <option value="1" {{ $ratingFilter == '1' ? 'selected' : '' }}>1 نجمة</option>
            </select>
            <select id="sortFilter" class="border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                <option value="latest" {{ $sortFilter == 'latest' ? 'selected' : '' }}>الترتيب حسب الأحدث</option>
                <option value="highest" {{ $sortFilter == 'highest' ? 'selected' : '' }}>الترتيب حسب الأعلى تقييماً</option>
                <option value="lowest" {{ $sortFilter == 'lowest' ? 'selected' : '' }}>الترتيب حسب الأقل تقييماً</option>
            </select>
        </div>
    </div>

    <!-- شريط توزيع التقييمات -->
    <div class="bg-gray-50 rounded-lg p-6 mb-8">
        <h3 class="font-bold text-gray-800 mb-4">توزيع التقييمات</h3>
        <div id="distributionContainer">
            @if ($ratingDistribution->count() > 0)
                <div class="space-y-3">
                    @foreach ($ratingDistribution as $rating)
                        <div class="flex items-center">
                            <div class="flex items-center w-20">
                                <span class="text-gray-600 text-sm w-6">{{ $rating['stars'] }}</span>
                                <i class="fas fa-star text-yellow-400 text-sm ml-1"></i>
                            </div>
                            <div class="flex-1 bg-gray-200 rounded-full h-2 ml-3">
                                <div class="bg-yellow-400 h-2 rounded-full transition-all duration-500 ease-out"
                                    style="width: {{ $rating['percent'] }}%"></div>
                            </div>
                            <span class="text-gray-600 text-sm w-12 text-left">{{ $rating['count'] }}</span>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center py-4">لا توجد تقييمات حتى الآن</p>
            @endif
        </div>
    </div>

    <!-- قائمة التقييمات -->
    <div id="ratingsListContainer" class="space-y-8">
        @include('partials.ratings_list', ['filteredRatings' => $filteredRatings])
    </div>

    <!-- الترقيم (يمكن إضافته لاحقاً) -->
    <div class="flex justify-center items-center space-x-2 space-x-reverse mt-8">
        <!-- سيتم إضافة الترقيم ديناميكياً لاحقاً -->
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
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

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(10deg);
            }
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
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
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

            0%,
            20%,
            50%,
            80%,
            100% {
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

            0%,
            7% {
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

            40%,
            100% {
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
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingFilter = document.getElementById('ratingFilter');
    const sortFilter = document.getElementById('sortFilter');
    const ratingsListContainer = document.getElementById('ratingsListContainer');
    const distributionContainer = document.getElementById('distributionContainer');
    const averageRatingElement = document.getElementById('averageRating');
    const ratingsCountElement = document.getElementById('ratingsCount');
    const starsContainer = document.getElementById('starsContainer');

    let isLoading = false;

    function updateFilters() {
        if (isLoading) return;

        isLoading = true;

        // إظهار مؤشر تحميل
        ratingsListContainer.innerHTML = `
            <div class="flex justify-center items-center py-8">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary"></div>
                <span class="mr-2 text-gray-600">جاري التحميل...</span>
            </div>
        `;

        const ratingValue = ratingFilter.value;
        const sortValue = sortFilter.value;

        // إرسال طلب Ajax
        fetch(`{{ route('profile.reviews', $freelancer->id) }}?rating=${ratingValue}&sort=${sortValue}&ajax=1`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // تحديث قائمة التقييمات
                ratingsListContainer.innerHTML = data.html;

                // تحديث شريط التوزيع
                distributionContainer.innerHTML = data.distribution_html || '';

                // تحديث الإحصائيات
                averageRatingElement.textContent = data.stats.average;
                ratingsCountElement.textContent = data.stats.count + ' تقييم';

                // تحديث النجوم
                updateStars(data.stats.average);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            ratingsListContainer.innerHTML = `
                <div class="text-center py-8 text-red-500">
                    <i class="fas fa-exclamation-triangle text-2xl mb-2"></i>
                    <p>حدث خطأ أثناء جلب البيانات</p>
                </div>
            `;
        })
        .finally(() => {
            isLoading = false;
        });
    }

    function updateStars(average) {
        const avg = parseFloat(average);
        const fullStars = Math.floor(avg);
        const decimal = avg - fullStars;

        let halfStar = false;
        let emptyStars = 5 - fullStars;

        if (decimal >= 0.8) {
            emptyStars = 5 - (fullStars + 1);
            halfStar = false;
        } else if (decimal >= 0.2) {
            emptyStars = 5 - fullStars - 1;
            halfStar = true;
        }

        let starsHTML = '';

        // نجوم كاملة
        for (let i = 0; i < fullStars; i++) {
            starsHTML += '<i class="fas fa-star"></i>';
        }

        // نصف نجمة
        if (halfStar) {
            starsHTML += '<i class="fas fa-star-half-alt" style="transform: scaleX(-1);"></i>';
        }

        // نجوم فارغة
        for (let i = 0; i < emptyStars; i++) {
            starsHTML += '<i class="far fa-star"></i>';
        }

        starsContainer.innerHTML = starsHTML;
    }

    // إضافة event listeners
    ratingFilter.addEventListener('change', updateFilters);
    sortFilter.addEventListener('change', updateFilters);
});
</script>
