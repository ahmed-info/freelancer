@extends('main.layout.layout')
@section('main_content')
    @php
        $bgColors = ['bg-red-100', 'bg-blue-100', 'bg-green-100', 'bg-amber-100', 'bg-purple-100', 'bg-yellow-100'];
        $txtColors = [
            'text-red-700',
            'text-sky-600',
            'text-green-700',
            'text-amber-700',
            'text-purple-700',
            'text-yellow-700',
        ];
    @endphp
    <main class="container mx-auto px-4 py-8">
        <!-- تفاصيل الخبر الرئيسي -->
        <div class="mb-8">
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- مسار التنقل -->
                <div class="p-4 border-b border-gray-200">
                    <nav class="text-sm text-gray-500">
                        <a href="{{ route('home') }}" class="hover:text-red-600" data-ar="الرئيسية" data-en="Home">الرئيسية</a>
                        <span class="mx-2">/</span>
                        <a href="{{ route('section', $article->section->id) }}" class="hover:text-red-600">{{ $article->section->title }}</a>
                        <span class="mx-2">/</span>
                        <span class="text-gray-700">{{ $article->title }}</span>
                    </nav>
                </div>

                <!-- محتوى الخبر -->
                <div class="p-6">
                    <!-- العنوان والفئة -->
                    <div class="mb-4">
                        <span class="{{ $bgColors[0] }} {{ $txtColors[0] }} px-3 py-1 rounded text-sm font-medium">
                            {{ $article->section->title }}
                        </span>
                        <h1 class="text-2xl md:text-3xl font-bold mt-3 text-gray-800">{{ $article->title }}</h1>
                    </div>

                    <!-- معلومات النشر -->
                    <div class="flex flex-wrap items-center text-sm text-gray-500 mb-6 border-b border-gray-200 pb-4">
                        <div class="flex items-center mr-6 mb-2">
                            <i class="far fa-calendar-alt ml-1"></i>
                            <span>{{ $article->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="flex items-center mr-6 mb-2">
                            <i class="far fa-clock ml-1"></i>
                            <span>{{ $article->created_at->format('h:i A') }}</span>
                        </div>
                        <div class="flex items-center mr-6 mb-2">
                            <i class="far fa-eye ml-1"></i>
                            <span data-ar="1254 مشاهدة" data-en="1254 views">1254 مشاهدة</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <i class="far fa-user ml-1"></i>
                            <span>{{ $article->author->name ?? 'محرر الموقع' }}</span>
                        </div>
                    </div>

                    <!-- الوسائط (صورة أو فيديو) -->
                    @if($article->image_path)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}"
                             class="w-full h-auto rounded-lg shadow-md">
                        @if($article->image_caption)
                        <p class="text-center text-sm text-gray-500 mt-2">{{ $article->image_caption }}</p>
                        @endif
                    </div>
                    @elseif($article->video_path)
                    <div class="mb-6">
                        <div class="video-container rounded-lg overflow-hidden">
                            <video controls class="w-full h-auto">
                                <source src="{{ asset('storage/' . $article->video_path) }}" type="video/mp4">
                                <source src="{{ asset('storage/' . $article->video_path) }}" type="video/webm">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        @if($article->video_caption)
                        <p class="text-center text-sm text-gray-500 mt-2">{{ $article->video_caption }}</p>
                        @endif
                    </div>
                    @endif

                    <!-- محتوى الخبر -->
                    <div class="prose max-w-none mb-8">
                        {!! nl2br(e($article->content)) !!}
                    </div>

                    <!-- الوسوم -->
                    @if($article->tags && count($article->tags) > 0)
                    <div class="mb-8">
                        <h3 class="text-lg font-bold mb-3" data-ar="الوسوم" data-en="Tags">الوسوم</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($article->tags as $tag)
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                #{{ $tag->name }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- مشاركة الخبر -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-bold mb-3" data-ar="مشاركة الخبر" data-en="Share Article">مشاركة الخبر</h3>
                        <div class="flex space-x-3 space-x-reverse">
                            <a href="#" class="bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="bg-blue-400 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-youtube"></i>
                            </a>
                            <a href="#" class="bg-blue-700 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="#" class="bg-green-500 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- أخبار ذات صلة -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold" data-ar="أخبار ذات صلة" data-en="Related News">أخبار ذات صلة</h2>
                <a href="{{ route('section', $article->section->id) }}" class="text-red-600 font-medium text-sm flex items-center" data-ar="عرض الكل" data-en="View All">
                    عرض الكل <i class="fas fa-arrow-left mr-1"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($relatedArticles as $index => $relatedArticle)
                <a href="{{ route('articles.details', $relatedArticle->id) }}" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($relatedArticle->image_path)
                    <img src="{{ asset('storage/' . $relatedArticle->image_path) }}" alt="{{ $relatedArticle->title }}"
                         class="w-full h-48 object-cover">
                    @elseif($relatedArticle->video_path)
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <i class="fas fa-play-circle text-4xl text-gray-500"></i>
                    </div>
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <i class="far fa-newspaper text-4xl text-gray-500"></i>
                    </div>
                    @endif
                    <div class="p-4">
                        <span class="{{ $bgColors[$index % count($bgColors)] }} {{ $txtColors[$index % count($txtColors)] }} px-2 py-1 rounded text-xs font-medium">
                            {{ $relatedArticle->section->title }}
                        </span>
                        <h3 class="font-bold mt-2 text-lg text-gray-800 line-clamp-2">{{ $relatedArticle->title }}</h3>
                        <p class="text-gray-600 mt-2 text-sm line-clamp-2">{{ Str::limit($relatedArticle->content, 100) }}</p>
                        <div class="flex justify-between items-center mt-4 text-xs text-gray-500">
                            <span>{{ $relatedArticle->created_at->diffForHumans() }}</span>
                            <span data-ar="784 مشاهدة" data-en="784 views">784 مشاهدة</span>
                        </div>
                    </div>
                </a>
                @empty
                <div class="col-span-3 text-center py-8 text-gray-500">
                    <p data-ar="لا توجد أخبار ذات صلة حالياً" data-en="No related articles available">لا توجد أخبار ذات صلة حالياً</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- التعليقات -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-6" data-ar="التعليقات" data-en="Comments">التعليقات (3)</h2>

                <!-- نموذج إضافة تعليق -->
                <div class="mb-8">
                    <form>
                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700 mb-2" data-ar="أضف تعليقك" data-en="Add your comment">أضف تعليقك</label>
                            <textarea id="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" placeholder="اكتب تعليقك هنا..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md font-medium transition-colors" data-ar="نشر التعليق" data-en="Post Comment">نشر التعليق</button>
                        </div>
                    </form>
                </div>

                <!-- قائمة التعليقات -->
                <div class="space-y-6">
                    <!-- تعليق 1 -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <i class="far fa-user text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-gray-800">أحمد محمد</h4>
                                    <span class="text-xs text-gray-500">منذ ساعة</span>
                                </div>
                                <p class="text-gray-700">مقال رائع ومعلومات قيمة. شكراً لكم على هذا المحتوى المميز.</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                    <button class="flex items-center ml-4 hover:text-red-600">
                                        <i class="far fa-thumbs-up ml-1"></i>
                                        <span>12</span>
                                    </button>
                                    <button class="flex items-center hover:text-red-600">
                                        <i class="far fa-thumbs-down ml-1"></i>
                                        <span>2</span>
                                    </button>
                                    <button class="flex items-center mr-4 hover:text-red-600">
                                        <i class="far fa-reply ml-1"></i>
                                        <span data-ar="رد" data-en="Reply">رد</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- تعليق 2 -->
                    <div class="border-b border-gray-200 pb-6">
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <i class="far fa-user text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-gray-800">فاطمة علي</h4>
                                    <span class="text-xs text-gray-500">منذ 3 ساعات</span>
                                </div>
                                <p class="text-gray-700">أتمنى المزيد من التفاصيل حول هذا الموضوع المهم. هل هناك مصادر إضافية يمكن الرجوع إليها؟</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                    <button class="flex items-center ml-4 hover:text-red-600">
                                        <i class="far fa-thumbs-up ml-1"></i>
                                        <span>8</span>
                                    </button>
                                    <button class="flex items-center hover:text-red-600">
                                        <i class="far fa-thumbs-down ml-1"></i>
                                        <span>0</span>
                                    </button>
                                    <button class="flex items-center mr-4 hover:text-red-600">
                                        <i class="far fa-reply ml-1"></i>
                                        <span data-ar="رد" data-en="Reply">رد</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- تعليق 3 -->
                    <div>
                        <div class="flex items-start space-x-4 space-x-reverse">
                            <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <i class="far fa-user text-gray-500"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-2">
                                    <h4 class="font-bold text-gray-800">خالد إبراهيم</h4>
                                    <span class="text-xs text-gray-500">منذ يوم</span>
                                </div>
                                <p class="text-gray-700">شكراً للكاتب على هذا التحليل الدقيق والموضوعي. أتمنى أن نرى المزيد من هذه المقالات التحليلية.</p>
                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                    <button class="flex items-center ml-4 hover:text-red-600">
                                        <i class="far fa-thumbs-up ml-1"></i>
                                        <span>15</span>
                                    </button>
                                    <button class="flex items-center hover:text-red-600">
                                        <i class="far fa-thumbs-down ml-1"></i>
                                        <span>1</span>
                                    </button>
                                    <button class="flex items-center mr-4 hover:text-red-600">
                                        <i class="far fa-reply ml-1"></i>
                                        <span data-ar="رد" data-en="Reply">رد</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container video,
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
