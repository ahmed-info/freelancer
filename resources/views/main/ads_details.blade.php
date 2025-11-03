@extends('main.layout.layout')
@section('main_content')
    <main class="container mx-auto px-4 py-8">
        <!-- العودة للصفحة الرئيسية -->
        <div class="mb-6">
            <a href="{{ route('home') }}" class="text-red-600 font-medium text-sm flex items-center hover:text-red-700 transition-colors">
                <i class="fas fa-arrow-right ml-2"></i>
                <span data-ar="العودة للرئيسية" data-en="Back to Home">العودة للرئيسية</span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- محتوى الإعلان الرئيسي -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- رأس الإعلان -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4">
                        <div class="flex justify-between items-center">
                            <span class="bg-white text-blue-600 px-3 py-1 rounded text-sm font-bold" data-ar="إعلان" data-en="AD">
                                إعلان
                            </span>
                            <span class="text-white text-sm" data-ar="إعلان مميز" data-en="Featured Ad">
                                إعلان مميز
                            </span>
                        </div>
                    </div>

                    <!-- عنوان الإعلان -->
                    <div class="p-6 border-b">
                        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $ad->title }}</h1>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-calendar-alt ml-2"></i>
                            <span data-ar="تاريخ النشر" data-en="Published">تاريخ النشر:</span>
                            <span class="mr-2">{{ $ad->created_at->format('Y-m-d') }}</span>
                            <span class="mx-3">•</span>
                            <span>{{ $ad->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- محتوى الإعلان -->
                    <div class="p-6">
                        @if ($ad->image_path != null)
                            <!-- إعلان بصورة -->
                            <div class="mb-6">
                                <img src="{{ $ad->imageUrl }}" alt="{{ $ad->title }}"
                                     class="w-full h-auto rounded-lg shadow-lg object-cover">
                            </div>
                        @elseif ($ad->video_path != null)
                            <!-- إعلان بفيديو -->
                            <div class="mb-6">
                                <div class="relative bg-black rounded-lg overflow-hidden" style="padding-bottom: 56.25%;">
                                    <video controls class="absolute inset-0 w-full h-full">
                                        <source src="{{ asset($ad->video_path) }}" type="video/mp4">
                                        <source src="{{ asset($ad->video_path) }}" type="video/webm">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ route('ads.video.download', $ad->id) }}" target="_blank"
                                       class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                                        <i class="fas fa-download ml-2"></i>
                                        <span data-ar="تحميل الفيديو" data-en="Download Video">تحميل الفيديو</span>
                                    </a>
                                </div>
                            </div>
                        @elseif ($ad->youtube_url !== null)
                            <!-- إعلان بيوتيوب -->
                            <div class="mb-6">
                                <div class="relative rounded-lg overflow-hidden" style="padding-bottom: 56.25%;">
                                    <iframe
                                        src="{{ youtubeToEmbed($ad->youtube_url) }}"
                                        title="{{ $ad->title }}"
                                        class="absolute inset-0 w-full h-full"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ $ad->youtube_url }}" target="_blank"
                                       class="inline-flex items-center bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                                        <i class="fab fa-youtube ml-2"></i>
                                        <span data-ar="شاهد على يوتيوب" data-en="Watch on YouTube">شاهد على يوتيوب</span>
                                    </a>
                                </div>
                            </div>
                        @endif

                        <!-- نص الإعلان -->
                        <div class="prose max-w-none">
                            <p class="text-gray-700 text-lg leading-relaxed">
                                {{ $ad->content }}
                            </p>
                        </div>

                        <!-- معلومات إضافية -->
                        @if($ad->phone || $ad->email || $ad->website)
                        <div class="mt-8 p-6 bg-gray-50 rounded-lg border border-gray-200">
                            <h3 class="text-xl font-bold text-gray-900 mb-4" data-ar="معلومات الاتصال" data-en="Contact Information">
                                معلومات الاتصال
                            </h3>
                            <div class="space-y-3">
                                @if($ad->phone)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-phone ml-3 text-blue-600"></i>
                                    <span>{{ $ad->phone }}</span>
                                </div>
                                @endif
                                @if($ad->email)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-envelope ml-3 text-blue-600"></i>
                                    <span>{{ $ad->email }}</span>
                                </div>
                                @endif
                                @if($ad->website)
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-globe ml-3 text-blue-600"></i>
                                    <a href="{{ $ad->website }}" target="_blank" class="text-blue-600 hover:underline">
                                        {{ $ad->website }}
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </article>
            </div>

            <!-- الشريط الجانبي -->
            <div class="space-y-6">
                <!-- إعلانات ذات صلة -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold border-r-4 border-blue-600 pr-2 mb-4" data-ar="إعلانات ذات صلة" data-en="Related Ads">
                        إعلانات ذات صلة
                    </h3>

                    @if(isset($relatedAds) && count($relatedAds) > 0)
                        @foreach($relatedAds as $relatedAd)
                        <a href="{{ route('ads.details', $relatedAd->id) }}" class="block mb-4 pb-4 border-b border-gray-200 last:border-0 hover:bg-gray-50 transition-colors rounded p-2">
                            <div class="flex space-x-4 space-x-reverse">
                                @if($relatedAd->image_path)
                                <img src="{{ $relatedAd->imageUrl }}" alt="{{ $relatedAd->title }}"
                                     class="w-20 h-20 object-cover rounded">
                                @endif
                                <div class="flex-1">
                                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-medium">
                                        إعلان
                                    </span>
                                    <h4 class="font-bold mt-1 text-sm text-gray-900">{{ $relatedAd->title }}</h4>
                                    <p class="text-gray-600 text-xs mt-1">{{ $relatedAd->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm" data-ar="لا توجد إعلانات ذات صلة" data-en="No related ads">
                            لا توجد إعلانات ذات صلة
                        </p>
                    @endif
                </div>

                <!-- إعلان جانبي -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg shadow-md p-6 border border-yellow-200">
                    <div class="text-center">
                        <span class="bg-yellow-500 text-white px-3 py-1 rounded text-xs font-bold">إعلان</span>
                        <h4 class="font-bold text-lg mt-4 text-gray-900" data-ar="مساحة إعلانية" data-en="Ad Space">
                            مساحة إعلانية
                        </h4>
                        <p class="text-gray-600 text-sm mt-2" data-ar="احجز مساحتك الإعلانية هنا" data-en="Book your ad space here">
                            احجز مساحتك الإعلانية هنا
                        </p>
                        <button class="mt-4 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-medium transition-colors">
                            <span data-ar="اتصل بنا" data-en="Contact Us">اتصل بنا</span>
                        </button>
                    </div>
                </div>

                <!-- مشاركة الإعلان -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold mb-4" data-ar="مشاركة الإعلان" data-en="Share Ad">
                        مشاركة الإعلان
                    </h3>
                    <div class="flex space-x-3 space-x-reverse">
                        <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-2 rounded transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </button>
                        <button class="flex-1 bg-sky-500 hover:bg-sky-600 text-white py-2 rounded transition-colors">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </button>
                        <button class="flex-1 bg-gray-600 hover:bg-gray-700 text-white py-2 rounded transition-colors">
                            <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- إعلانات أخرى -->
        <div class="mt-12">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold" data-ar="إعلانات أخرى قد تهمك" data-en="Other Ads You May Like">
                    إعلانات أخرى قد تهمك
                </h2>
                <a href="{{ route('home') }}" class="text-blue-600 font-medium text-sm flex items-center hover:text-blue-700 transition-colors">
                    <span data-ar="عرض الكل" data-en="View All">عرض الكل</span>
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if(isset($otherAds) && count($otherAds) > 0)
                    @foreach($otherAds as $otherAd)
                    <a href="{{ route('ad.show', $otherAd->id) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        @if($otherAd->image_path)
                        <img src="{{ $otherAd->imageUrl }}" alt="{{ $otherAd->title }}"
                             class="w-full h-48 object-cover">
                        @endif
                        <div class="p-4">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs font-medium">
                                إعلان
                            </span>
                            <h3 class="font-bold mt-2 text-lg text-gray-900">{{ $otherAd->title }}</h3>
                            <p class="text-gray-600 mt-2 text-sm line-clamp-2">{{ $otherAd->content }}</p>
                            <div class="flex justify-between items-center mt-4 text-xs text-gray-500">
                                <span>{{ $otherAd->created_at->diffForHumans() }}</span>
                                <span class="text-blue-600 font-medium" data-ar="اقرأ المزيد" data-en="Read More">
                                    اقرأ المزيد
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                @endif
            </div>
        </div>
    </main>
@endsection
