@extends('main.layout.layout')
@section('main_content')
    <section class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary">
                        <i class="fas fa-home"></i>
                    </a>
                    <span class="text-gray-300">|</span>
                    <a href="{{ route('freelancers.index') }}" class="text-gray-600 hover:text-primary">صاحب عمل حر</a>
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


                    <!-- نبذة عني -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-bold text-gray-800 mb-4">نبذة عني</h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $freelancer->bio }}
                        </p>
                    </div>

                    {{-- <!-- الخدمات -->
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-bold text-gray-800">الخدمات</h3>
                        <a href="#" class="text-primary hover:text-secondary text-sm">عرض الكل</a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($freelancer->services as $service)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                            <h4 class="font-bold text-gray-800 mb-2">{{ $service->title }}</h4>
                            <div class="flex justify-between items-center text-sm text-gray-600">
                                <span>يبدأ من ${{ $service->price }}</span>
                                <span>{{ $service->delivery_days }} أيام</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div> --}}

                    <!-- المشاريع السابقة -->
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-gray-800">المشاريع السابقة</h3>
                            <a href="#" class="text-primary hover:text-secondary text-sm">عرض الكل</a>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ($freelancer->projects as $project)
                                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-300">
                                    <!-- عنوان المشروع -->
                                    <h4 class="font-bold text-gray-800 mb-2">{{ $project->title }}</h4>
                                    <!-- وصف المشروع -->
                                    <p class="text-gray-600 text-sm mb-3">{{ $project->description }}</p>

                                    <!-- المرفقات - سأضعها في قسم منفصل بعد الوصف -->
                                    <div class="mb-3">
                                        @if ($project->attachments)
                                            <div class="flex flex-wrap gap-2">
                                                @foreach (json_decode($project->attachments) as $attachmentPath)
                                                    @php
                                                        $fileExtension = strtolower(
                                                            pathinfo($attachmentPath, PATHINFO_EXTENSION),
                                                        );
                                                        $imageExtensions = [
                                                            'jpg',
                                                            'jpeg',
                                                            'png',
                                                            'gif',
                                                            'bmp',
                                                            'svg',
                                                            'webp',
                                                        ];
                                                        $fileExists = file_exists(public_path($attachmentPath));
                                                    @endphp

                                                    @if (in_array($fileExtension, $imageExtensions) && $fileExists)
                                                        <img src="{{ asset($attachmentPath) }}" alt="Attachment"
                                                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                                                            onclick="showFullImage('{{ asset($attachmentPath) }}')">


                                                    @endif
                                                @endforeach

                                                 <div class="mt-2">
                                                    @foreach (json_decode($project->attachments) as $attachmentPath)
                                                    @php
                                                        $fileExtension = strtolower(
                                                            pathinfo($attachmentPath, PATHINFO_EXTENSION),
                                                        );
                                                        $fileExtensions = [
                                                            'pdf',
                                                            'xlsx',
                                                            'docx',
                                                            'pptx',
                                                        ];
                                                        $fileExists = file_exists(public_path($attachmentPath));
                                                    @endphp

                                                    @if (in_array($fileExtension, $fileExtensions) && $fileExists)
                                                        <a href="{{ asset($attachmentPath) }}" target="_blank"
                                                            class="btn bg-primary hover:bg-secondary hover:text-white px-2 py-1 rounded btn-sm btn-primary mb-1">عرض
                                                            الملف</a>


                                                    @endif
                                                @endforeach
                                                 </div>
                                            </div>
                                        @else
                                            <span class="text-muted">لا توجد ملفات مرفقة</span>
                                        @endif
                                    </div>

                                    <!-- التقييم - سيتم وضعه في أسفل البطاقة على اليمين -->
                                    <div class="flex justify-end items-center">
                                        <span class="text-yellow-400 ml-1">{{ number_format($freelancer->averageRating(), 1) }}</span>
                                        <i class="fas fa-star text-yellow-400"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- نافذة عرض الصورة بالحجم الكامل -->
                        <div id="imageModal"
                            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.8); z-index: 1000; justify-content: center; align-items: center;">
                            <div style="position: relative; max-width: 90%; max-height: 90%;">
                                <span onclick="closeModal()"
                                    style="position: absolute; top: -40px; right: 0; color: white; font-size: 30px; cursor: pointer; z-index: 1001;">&times;</span>
                                <img id="fullSizeImage" src=""
                                    style="max-width: 100%; max-height: 100%; display: block;">
                            </div>
                        </div>
                    </div>

                    <!-- التقييمات -->
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-gray-800">التقييمات ({{ $freelancer->RatingsCount() }})</h3>
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
                            @foreach ([['name' => 'أحمد محمد', 'comment' => 'عمل رائع ومتقن، التزم بالوقت وكان التواصل سلساً. أنصح بالتعامل معه', 'rating' => 5, 'date' => 'منذ شهر'], ['name' => 'سارة عبدالله', 'comment' => 'مطور محترف، فهم المتطلبات بدقة وأنهى العمل قبل الوقت المحدد', 'rating' => 5, 'date' => 'منذ شهرين'], ['name' => 'خالد السماري', 'comment' => 'تجربة جيدة، العمل كان متقناً ولكن تأخر قليلاً في التسليم', 'rating' => 4, 'date' => 'منذ 3 أشهر']] as $review)
                                <div class="border-b border-gray-200 pb-6 last:border-0">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gray-300 rounded-full ml-3"></div>
                                            <div>
                                                <h4 class="font-bold text-gray-800">{{ $review['name'] }}</h4>
                                                <div class="flex text-yellow-400 text-sm">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <i
                                                            class="fas fa-star{{ $i > $review['rating'] ? ($i == $review['rating'] + 0.5 ? '-half-alt' : '') : '' }}"></i>
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
    </style>

    <script>
        function showFullImage(imageSrc) {
            document.getElementById('fullSizeImage').src = imageSrc;
            document.getElementById('imageModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        // إغلاق النافذة عند الضغط خارج الصورة
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // إغلاق النافذة بالزر ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
@endsection
