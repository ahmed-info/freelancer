@extends('main.layout.layout')
@section('main_content')
    <!-- المحتوى الرئيسي -->
    <!-- المحتوى الرئيسي للأخبار الاقتصادية -->
    <main class="container mx-auto px-4 py-8">
        <!-- عنوان الصفحة -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2" data-ar="اخبار الاقتصادية" data-en="Economic News">اخبار
                {{ $section->title }}</h1>
            <p class="text-gray-600 max-w-2xl mx-auto"
                data-ar="تابع آخر التطورات والأخبار في عالم الاقتصاد والأسواق المالية والمستجدات الاقتصادية المحلية والعالمية"
                data-en="Follow the latest developments and news in the world of economy, financial markets, and local and global economic updates">
                {{ $section->description }}</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <!-- المقال الرئيسي -->
            <div class="lg:col-span-2">
                <article class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        @if ($articles[0]->image_path != null)
                            <img src="{{ $articles[0]->imageUrl }}" alt="{{ $articles[0]->title }}"
                                class="w-full h-64 md:h-80 object-cover">

                            <div
                                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded text-sm font-medium" data-ar="اقتصاد"
                                    data-en="Economy">{{ $articles[0]->section->title }}</span>
                                <h2 class="text-xl md:text-2xl font-bold mt-2"
                                    data-ar="وزير المالية يعلن عن خطة شاملة لتحفيز النمو الاقتصادي"
                                    data-en="Finance Minister announces comprehensive plan to stimulate economic growth">
                                    {{ $articles[0]->title }}</h2>
                                <p class="mt-2 text-gray-200 text-sm md:text-base"
                                    data-ar="كشف وزير المالية عن خطة طموحة تهدف إلى تحفيز النمو الاقتصادي وزيادة الاستثمارات الأجنبية وتوفير فرص عمل جديدة."
                                    data-en="The Finance Minister revealed an ambitious plan aimed at stimulating economic growth, increasing foreign investments, and providing new job opportunities.">
                                    {{ Str::limit($articles[0]->content, 100) }}</p>
                                <div class="flex items-center mt-4 text-sm">
                                    <span data-ar="منذ 4 ساعات"
                                        data-en="4 hours ago">{{ $articles[0]->created_at->diffForHumans() }}</span>
                                    <span class="mx-2">•</span>
                                    <span data-ar="1843 مشاهدة" data-en="1843 views">
                                    </span>
                                </div>
                            </div>
                        @elseif ($articles[0]->video_path != null)
                            <div class="p-4">
                                <h3 class="font-bold text-lg text-gray-800 mb-2" data-ar="برنامج اللياقة البدنية الجديد"
                                    data-en="New Fitness Program">
                                    {{ $articles[0]->title }}
                                </h3>
                                <p class="text-gray-700 mb-4 text-sm"
                                    data-ar="انضم إلى برنامجنا المبتكر لللياقة البدنية وابدأ رحلتك نحو حياة أكثر صحة وحيوية."
                                    data-en="Join our innovative fitness program and start your journey towards a healthier, more vibrant life.">
                                    {{ $articles[0]->content }}
                                </p>

                                <!-- فيديو -->
                                <div class="video-container h-64 md:h-80 mb-4 rounded-lg overflow-hidden">
                                    <video controls class="max-w-full mt-1 rounded shadow">
                                        <source src="{{ $articles[0]->videoUrl }}" type="video/mp4">
                                        <source src="{{ $articles[0]->videoUrl }}" type="video/webm">
                                    </video>
                                </div>
                                <a href="{{ route('ads.video.download', $articles[0]->id) }}" target="_blank"
                                    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors w-full">
                                    تحميل الفيديو
                                </a>
                            </div>
                        @endif
                    </div>
                </article>
            </div>
            @php
                $mostImportantNews = $articles->slice(1, 3);
                $recentNews = $articles->slice(4, 10);
            @endphp

            <!-- الأخبار الجانبية -->
            <div class="space-y-6">
                <h3 class="text-lg font-bold border-r-4 border-blue-600 pr-2" data-ar="أهم اخبار {{ $section->title }}"
                    data-en="Top Economic News">أهم اخبار {{ $section->title }}</h3>
                @foreach ($mostImportantNews as $article)
                    <a href="{{ route('articles.details', $article) }}" class="bg-white rounded-lg shadow-md p-4 flex space-x-4 space-x-reverse">
                        @if ($article->image_path != null)
                            <img src="{{ $article->imageUrl }}" alt="{{ $article->title }}"
                                class="w-24 h-24 object-cover rounded">
                        @else
                            <img src="{{ asset('assets/images/logo.png') }}" alt="{{ $article->title }}"
                                class="w-24 h-24 object-cover rounded">
                        @endif
                        <div>
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium" data-ar="أسواق"
                                data-en="Markets">{{ $article->section->title }}</span>
                            <h4 class="font-bold mt-1 text-sm" data-ar="ارتفاع أسعار النفط عالمياً بنسبة 5%"
                                data-en="Global oil prices rise by 5%">{{ $article->title }}</h4>
                            <p class="text-gray-600 text-xs mt-1" data-ar="منذ ساعة" data-en="1 hour ago">
                                {{ $article->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>

        <!-- أحدث الأخبار -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold" data-ar="أحدث الأخبار الاقتصادية" data-en="Latest Economic News">أحدث اخبار
                    {{ $section->title }}</h2>
                <a href="#" class="text-blue-600 font-medium text-sm flex items-center" data-ar="عرض المزيد"
                    data-en="View All">عرض المزيد <i class="fas fa-arrow-left mr-1"></i></a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- احدث المقالات -->
                @foreach ($recentNews as $new)
                    <article class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if ($new->image_path != null)
                            <img src="{{ $new->imageUrl }}" alt="Economic News 1" class="w-full h-48 object-cover">
                        @elseif ($new->video_path != null)
                            <div class="video-container h-60 mb-4 rounded-lg overflow-hidden">
                                <video controls class="w-full mt-1 h-64 rounded shadow">
                                    <source src="{{ asset('storage/' . $new->video_path) }}" type="video/mp4">
                                    <source src="{{ asset('storage/' . $new->video_path) }}" type="video/webm">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        @endif

                        <div class="p-4">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs font-medium" data-ar="تجزئة"
                                data-en="Retail">{{ $new->section->title }}</span>
                            <h3 class="font-bold mt-2 text-lg" data-ar="ارتفاع مبيعات التجزئة بنسبة 8% خلال الربع الأخير"
                                data-en="Retail sales rise 8% in the last quarter">{{ $new->title }}</h3>
                            <p class="text-gray-600 mt-2 text-sm"
                                data-ar="سجلت مبيعات التجزئة ارتفاعاً ملحوظاً خلال الربع الأخير مدعومة بزيادة الإنفاق الاستهلاكي وتحسن الثقة الاقتصادية."
                                data-en="Retail sales recorded a noticeable increase during the last quarter, supported by increased consumer spending and improved economic confidence.">
                                {{ Str::limit($new->content, 100) }}
                            </p>
                            <div class="flex justify-between items-center mt-4 text-xs text-gray-500">
                                <span data-ar="منذ 6 ساعات"
                                    data-en="6 hours ago">{{ $new->created_at->diffForHumans() }}</span>
                                <span data-ar="942 مشاهدة" data-en="942 views"></span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </main>
@endsection
