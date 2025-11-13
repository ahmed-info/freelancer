@extends('main.layout.layout')
@section('main_content')

<!-- Modal تسجيل الدخول -->
@guest
<div id="registerModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white animate-fade-in">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-900">ابدأ كمقدم خدمة</h3>
            <button id="closeModal" class="text-gray-400 hover:text-gray-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <div class="mb-4 p-3 bg-blue-50 border border-blue-200 rounded-md">
            <p class="text-sm text-blue-800 text-right">
                <i class="fas fa-info-circle ml-2"></i>
                 انضم كمقدم خدمة
            </p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 text-right">الاسم الكامل</label>
                <input type="text" id="name" name="name" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                    placeholder="أدخل اسمك">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 text-right">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                    placeholder="أدخل بريدك الإلكتروني">
            </div>

            <div class="relative mb-2">
                <input type="hidden" name="role" id="role" value="freelance">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2 text-right">كلمة المرور</label>
                <input type="password" id="password" name="password" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                    placeholder="أدخل كلمة المرور">
            </div>

            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('password.request') }}" class="inline-block align-baseline font-bold text-sm text-primary hover:text-secondary">
                    نسيت كلمة المرور؟
                </a>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <span class="ml-2 text-sm text-gray-700">تذكرني</span>
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-primary rounded">
                    </label>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <button type="submit"
                    class="bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-300">
                    تسجيل الدخول
                </button>

                <div class="text-center text-gray-600 text-sm">
                    ليس لديك حساب؟
                    <a href="{{ route('login') }}" class="text-primary hover:text-secondary font-bold">
                        سجل الآن كمقدم خدمة
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="loginModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white animate-fade-in">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-900">تسجيل الدخول</h3>
            <button id="closeLoginModal" class="text-gray-400 hover:text-gray-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form action="{{ route('storeRole') }}" method="POST" class="mt-4">
            @csrf

            <div class="mb-4">
                <label for="email2" class="block text-gray-700 text-sm font-bold mb-2 text-right">البريد الإلكتروني</label>
                <input type="email" id="email2" name="email" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                    placeholder="أدخل بريدك الإلكتروني">
            </div>

            <div class="mb-6">
                <label for="password2" class="block text-gray-700 text-sm font-bold mb-2 text-right">كلمة المرور</label>
                <input type="password" id="password2" name="password" required
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                    placeholder="أدخل كلمة المرور">
            </div>

            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('password.request') }}" class="inline-block align-baseline font-bold text-sm text-primary hover:text-secondary">
                    نسيت كلمة المرور؟
                </a>
                <div class="flex items-center">
                    <label class="flex items-center">
                        <span class="ml-2 text-sm text-gray-700">تذكرني</span>
                        <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-primary rounded">
                    </label>
                </div>
            </div>

            <div class="flex flex-col gap-3">
                <button type="submit"
                    class="bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-300">
                    تسجيل الدخول
                </button>

                <div class="text-center text-gray-600 text-sm">
                    ليس لديك حساب؟
                    <a href="{{ route('login') }}" class="text-primary hover:text-secondary font-bold">
                        سجل الآن كمقدم خدمة
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endguest

    <!-- قسم الهيرو للمستقلين -->
    <section class="gradient-bg text-white py-16 md:py-24 relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0 animate-fade-in">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight animate-fade-in-up">اختر افضل اصحاب العمل الحر</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-fade-in-up" style="animation-delay: 0.2s">ابحث عن صاحب عمل حر محترف لتنفيذ مشروعك من بين آلاف المواهب العربية المتخصصة في مختلف المجالات</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                        <a href="#" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">ابحث عن صاحب عمل حر</a>
                        @if(auth()->check() && auth()->user()->role == 'freelance')
                        <a href="{{ route('profile.freelancer.create') }}" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105">انضم كصاحب عمل حر</a>
                        @else
                        <a href="#" id="heroLoginModalLink" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">ابدأ كمقدم خدمة</a>
                     @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم البحث والتصفية -->
    <section class="py-12 bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <input type="text" placeholder="ابحث عن مستقل بالمهارة أو الاسم..." class="w-full py-3 px-4 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        <div class="absolute left-3 top-3 text-gray-400">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-2/3 flex flex-wrap gap-4">
                    <select class="py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent flex-1 min-w-[150px]">
                        <option value="">جميع التخصصات</option>
                        <option value="programming">برمجة وتطوير</option>
                        <option value="design">تصميم</option>
                        <option value="marketing">تسويق إلكتروني</option>
                        <option value="writing">كتابة وترجمة</option>
                    </select>

                    <select class="py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent flex-1 min-w-[150px]">
                        <option value="">جميع المستويات</option>
                        <option value="beginner">مبتدئ</option>
                        <option value="intermediate">متوسط</option>
                        <option value="expert">خبير</option>
                    </select>

                    <select class="py-3 px-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent flex-1 min-w-[150px]">
                        <option value="">التقييم</option>
                        <option value="5">5 نجوم</option>
                        <option value="4">4 نجوم فأكثر</option>
                        <option value="3">3 نجوم فأكثر</option>
                    </select>

                    <button class="bg-primary hover:bg-secondary text-white py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                        تطبيق الفلتر
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم عرض المستقلين -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 animate-fade-in-up">اكتشف أفضل المواهب العربية</h2>
                    <p class="text-gray-600 animate-fade-in-up" style="animation-delay: 0.2s">تصفح آلاف المستقلين الموهوبين وابحث عن المناسب لمشروعك</p>
                </div>
                <div class="mt-4 md:mt-0">
                    <div class="flex items-center space-x-2 space-x-reverse">
                        <span class="text-gray-600">ترتيب حسب:</span>
                        <select class="py-2 px-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            <option value="recommended">الأكثر ملائمة</option>
                            <option value="rating">الأعلى تقييماً</option>
                            <option value="newest">الأحدث</option>
                            <option value="completed">الأكثر مشاريع مكتملة</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($freelancers as $freelancer)
                 <div class="freelancer-card bg-white rounded-xl shadow-md overflow-hidden animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold text-xl ml-4">
                                    {{ mb_substr($freelancer->user->name, 0, 1, 'UTF-8') }}
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-800 text-lg">{{ $freelancer->user->name }}</h3>
                                    <p class="text-gray-600">{{ $freelancer->title }}</p>
                                </div>
                                <div class="{{ $freelancer->is_online ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-xs font-semibold px-2 py-1 rounded">
                                    {{ $freelancer->is_online ? 'متاح للعمل' : 'غير متاح' }}
                                </div>
                            </div>

                            <div class="flex items-center mb-4">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="text-gray-600 text-sm mr-2">({{ $freelancer->rating }})</span>
                                <span class="text-gray-500 text-sm">• {{ $freelancer->reviews_count }} مشروع مكتمل</span>
                            </div>

                            <p class="text-gray-700 mb-4">{{ $freelancer->bio }}</p>

                            <div class="flex flex-wrap mb-4">
                                @foreach ($freelancer->skills as $skill)
                                    <span class="skill-tag">{{ $skill->name }}</span>
                                @endforeach
                            </div>

                            <div class="flex justify-between items-center gap-2">
                                <a href="{{ route('profile.main', ['id' => $freelancer->id]) }}" class="bg-primary hover:bg-secondary text-white py-2 px-4 rounded-lg text-sm transition duration-300 transform hover:scale-105 flex-1 text-center">
                                    عرض الملف الشخصي
                                </a>
                                <!-- زر المراسلة مع تمرير معرف المستقل -->
                                <button class="msg-btn bg-lime-500 hover:bg-lime-600 text-white py-2 px-4 rounded-lg text-sm transition duration-300 transform hover:scale-105 flex items-center flex-1 justify-center"
                                    data-freelancer-id="{{ $freelancer->id }}"
                                    data-freelancer-name="{{ $freelancer->user->name }}">
                                    <i class="fas fa-envelope ml-2"></i>
                                    مراسلة
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center mt-12">
                <a href="#" class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                    عرض المزيد من المستقلين
                    <i class="fas fa-arrow-left mr-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- قسم لماذا تختار مستقل -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 animate-fade-in-up">لماذا تختار مستقل لعملك؟</h2>
                <p class="text-gray-600 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">نوفر لك أفضل المواهب العربية مع ضمان جودة العمل وحماية حقوقك</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up" style="animation-delay: 0.1s">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-check text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">مستقلون موثوقون</h3>
                    <p class="text-gray-600">جميع المستقلين في منصتنا خضعوا لمراجعة ملفاتهم وتقييماتهم لضمان جودة عملهم</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">حماية الدفع</h3>
                    <p class="text-gray-600">نحمي مدفوعاتك حتى تستلم العمل بشكل كامل ومطابق للمواصفات المتفق عليها</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 text-center card-hover animate-fade-in-up" style="animation-delay: 0.5s">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">دعم فني متكامل</h3>
                    <p class="text-gray-600">فريق الدعم الفني متاح على مدار الساعة لمساعدتك في حل أي مشكلة تواجهك</p>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم CTA -->
    <section class="py-16 gradient-bg text-white relative overflow-hidden">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 animate-fade-in-up">هل أنت مستقل تبحث عن فرص عمل؟</h2>
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى آلاف المستقلين العرب وابدأ في كسب المال من مهاراتك عبر الإنترنت</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                <a href="{{ route('profile.freelancer.create') }}" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">انضم كصاحب عمل حر</a>
                <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">اعرف المزيد</a>
            </div>
        </div>
    </section>

    <!-- شريط الدردشة الجانبي -->
    <div id="chatSidebar" class="fixed inset-y-0 right-0 w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 z-50 border-r border-gray-200">
        <div class="flex flex-col h-full">
            <!-- رأس الشريط -->
            <div class="bg-primary text-white p-4 flex justify-between items-center">
                <h3 class="text-lg font-bold">الدردشة مع <span id="chatFreelancerName"></span></h3>
                <button id="closeChat" class="text-white hover:text-gray-200">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- منطقة الرسائل -->
            <div class="flex-1 overflow-y-auto p-4" id="chatMessages">
                <!-- سيتم ملء الرسائل هنا -->
                <div class="text-center text-gray-500 py-10">
                    <i class="fas fa-comments text-4xl mb-3 block"></i>
                    <p>لا توجد رسائل سابقة</p>
                </div>
            </div>

            <!-- منطقة إدخال الرسالة -->
            <div class="p-4 border-t border-gray-200">
                <form id="messageForm" class="flex gap-2">
                    <input type="text" id="messageInput" placeholder="اكتب رسالتك..."
                        class="flex-1 py-2 px-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-right"
                        autocomplete="off">
                    <button type="submit" class="bg-primary hover:bg-secondary text-white py-2 px-4 rounded-lg transition duration-300">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- زر فتح الدردشة العائم -->
    <div id="chatFloatingBtn" class="fixed bottom-6 left-6 bg-primary hover:bg-secondary text-white w-14 h-14 rounded-full shadow-lg flex items-center justify-center cursor-pointer transition duration-300 z-40 hidden">
        <i class="fas fa-comments text-xl"></i>
    </div>

    <!-- overlay للخلفية -->
    <div id="chatOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

    <style>
        .chat-item {
            transition: all 0.3s ease;
        }

        .chat-item:hover {
            transform: translateX(-5px);
        }

        #chatSidebar {
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }

        #chatFloatingBtn {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        #chatFloatingBtn:hover {
            transform: scale(1.1);
        }

        /* تنسيق الرسائل */
        .message {
            margin-bottom: 12px;
        }

        .message.sent {
            display: flex;
            justify-content: flex-end;
        }

        .message.received {
            display: flex;
            justify-content: flex-start;
        }

        .message-content {
            max-width: 70%;
            padding: 10px 14px;
            border-radius: 12px;
            word-wrap: break-word;
        }

        .message.sent .message-content {
            background-color: #3b82f6;
            color: white;
            border-bottom-right-radius: 0;
        }

        .message.received .message-content {
            background-color: #e5e7eb;
            color: #1f2937;
            border-bottom-left-radius: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ===== متغيرات عامة =====
            const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
            const currentUserId = {{ auth()->check() ? auth()->user()->id : 'null' }};
            let currentFreelancerId = null;

            // ===== عناصر DOM =====
            const loginModal = document.getElementById('loginModal');
            const closeLoginModal = document.getElementById('closeLoginModal');
            const chatSidebar = document.getElementById('chatSidebar');
            const closeChat = document.getElementById('closeChat');
            const chatOverlay = document.getElementById('chatOverlay');
            const chatFloatingBtn = document.getElementById('chatFloatingBtn');
            const messageForm = document.getElementById('messageForm');
            const messageInput = document.getElementById('messageInput');
            const chatMessages = document.getElementById('chatMessages');
            const chatFreelancerName = document.getElementById('chatFreelancerName');

            // ===== الدوال الأساسية =====

            // فتح نموذج الدخول
            function openLoginModal() {
                loginModal.classList.remove('hidden');
            }

            // إغلاق نموذج الدخول
            function closeLoginModalFunc() {
                loginModal.classList.add('hidden');
            }

            // فتح شريط الدردشة
            function openChatSidebar(freelancerId, freelancerName) {
                currentFreelancerId = freelancerId;
                chatFreelancerName.textContent = freelancerName;
                chatMessages.innerHTML = `
                    <div class="text-center text-gray-500 py-10">
                        <i class="fas fa-comments text-4xl mb-3 block"></i>
                        <p>ابدأ المحادثة</p>
                    </div>
                `;
                messageInput.value = '';
                chatSidebar.classList.remove('translate-x-full');
                chatOverlay.classList.remove('hidden');
                chatFloatingBtn.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            // إغلاق شريط الدردشة
            function closeChatSidebar() {
                chatSidebar.classList.add('translate-x-full');
                chatOverlay.classList.add('hidden');
                chatFloatingBtn.classList.add('hidden');
                document.body.style.overflow = 'auto';
                currentFreelancerId = null;
            }

            // إضافة رسالة إلى الدردشة
            function addMessageToChat(message, isSent) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${isSent ? 'sent' : 'received'}`;
                messageDiv.innerHTML = `<div class="message-content">${message}</div>`;
                chatMessages.appendChild(messageDiv);
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }

            // ===== Event Listeners =====

            // أزرار المراسلة في البطاقات
            document.querySelectorAll('.msg-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    if (!isAuthenticated) {
                        // إذا لم يكن مسجل دخول، فتح نموذج الدخول
                        openLoginModal();
                    } else {
                        // إذا كان مسجل دخول، فتح الدردشة
                        const freelancerId = this.getAttribute('data-freelancer-id');
                        const freelancerName = this.getAttribute('data-freelancer-name');
                        openChatSidebar(freelancerId, freelancerName);
                    }
                });
            });

            // إغلاق نموذج الدخول
            if (closeLoginModal) {
                closeLoginModal.addEventListener('click', closeLoginModalFunc);
            }

            // إغلاق نموذج الدخول عند النقر خارج المحتوى
            if (loginModal) {
                loginModal.addEventListener('click', function(e) {
                    if (e.target === loginModal) {
                        closeLoginModalFunc();
                    }
                });
            }

            // التحكم في شريط الدردشة
            closeChat.addEventListener('click', closeChatSidebar);
            chatOverlay.addEventListener('click', closeChatSidebar);
            chatFloatingBtn.addEventListener('click', () => {
                if (chatSidebar.classList.contains('translate-x-full')) {
                    openChatSidebar(currentFreelancerId, chatFreelancerName.textContent);
                } else {
                    closeChatSidebar();
                }
            });

            // منع إغلاق الشريط عند النقر داخله
            chatSidebar.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // معالجة إرسال الرسالة
            messageForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const message = messageInput.value.trim();
                if (message && currentFreelancerId) {
                    // إضافة الرسالة إلى الواجهة
                    addMessageToChat(message, true);

                    // هنا يمكن إضافة AJAX لإرسال الرسالة إلى الخادم
                    // مثال:
                    // fetch('/messages/send', {
                    //     method: 'POST',
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    //     },
                    //     body: JSON.stringify({
                    //         freelancer_id: currentFreelancerId,
                    //         message: message
                    //     })
                    // }).then(response => response.json())
                    //   .then(data => {
                    //       console.log('تم إرسال الرسالة:', data);
                    //   });

                    messageInput.value = '';
                    messageInput.focus();
                }
            });

            // رابط نموذج الدخول في قسم البطل
            const heroLoginModalLink = document.getElementById('heroLoginModalLink');
            if (heroLoginModalLink) {
                heroLoginModalLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    openLoginModal();
                });
            }
        });
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // ===== متغيرات عامة =====
        const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        const currentUserId = {{ auth()->check() ? auth()->user()->id : 'null' }};
        let currentConversationId = null;
        let currentFreelancerId = null;

        // ===== عناصر DOM =====
        const loginModal = document.getElementById('loginModal');
        const closeLoginModal = document.getElementById('closeLoginModal');
        const chatSidebar = document.getElementById('chatSidebar');
        const closeChat = document.getElementById('closeChat');
        const chatOverlay = document.getElementById('chatOverlay');
        const chatFloatingBtn = document.getElementById('chatFloatingBtn');
        const messageForm = document.getElementById('messageForm');
        const messageInput = document.getElementById('messageInput');
        const chatMessages = document.getElementById('chatMessages');
        const chatFreelancerName = document.getElementById('chatFreelancerName');

        // ===== الدوال الأساسية =====

        // فتح نموذج الدخول
        function openLoginModal() {
            loginModal.classList.remove('hidden');
        }

        // إغلاق نموذج الدخول
        function closeLoginModalFunc() {
            loginModal.classList.add('hidden');
        }

        // فتح شريط الدردشة
        function openChatSidebar(conversationId, freelancerName) {
            currentConversationId = conversationId;
            chatFreelancerName.textContent = freelancerName;
            loadMessages(conversationId);
            chatSidebar.classList.remove('translate-x-full');
            chatOverlay.classList.remove('hidden');
            chatFloatingBtn.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // إغلاق شريط الدردشة
        function closeChatSidebar() {
            chatSidebar.classList.add('translate-x-full');
            chatOverlay.classList.add('hidden');
            chatFloatingBtn.classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentConversationId = null;
            currentFreelancerId = null;
        }

        // تحميل الرسائل
        function loadMessages(conversationId) {
            fetch(`/get-messages/${conversationId}`)
                .then(response => response.json())
                .then(messages => {
                    displayMessages(messages);
                })
                .catch(error => console.error('Error loading messages:', error));
        }

        // عرض الرسائل
        function displayMessages(messages) {
            chatMessages.innerHTML = '';
            if (messages.length === 0) {
                chatMessages.innerHTML = `
                    <div class="text-center text-gray-500 py-10">
                        <i class="fas fa-comments text-4xl mb-3 block"></i>
                        <p>ابدأ المحادثة</p>
                    </div>
                `;
                return;
            }

            messages.forEach(message => {
                addMessageToChat(message.message, message.sender_id == currentUserId, false);
            });
        }

        // إضافة رسالة إلى الدردشة
        function addMessageToChat(message, isSent, saveToServer = false) {
            const messageDiv = document.createElement('div');
            messageDiv.className = `message ${isSent ? 'sent' : 'received'}`;
            messageDiv.innerHTML = `<div class="message-content">${message}</div>`;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;

            // إذا كانت رسالة جديدة من المستخدم، أرسلها إلى الخادم
            if (saveToServer && currentConversationId) {
                sendMessageToServer(message);
            }
        }

        // إرسال الرسالة إلى الخادم
        function sendMessageToServer(message) {
            const formData = new FormData();
            formData.append('conversation_id', currentConversationId);
            formData.append('message', message);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

            fetch('/send-message', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status !== 'success') {
                    console.error('Failed to send message');
                }
            })
            .catch(error => console.error('Error sending message:', error));
        }

        // بدء محادثة جديدة
        function startNewConversation(freelancerId, freelancerName) {
            const formData = new FormData();
            formData.append('freelancer_id', freelancerId);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

            fetch('/start-conversation', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                currentConversationId = data.conversation_id;
                openChatSidebar(data.conversation_id, freelancerName);
            })
            .catch(error => console.error('Error starting conversation:', error));
        }

        // ===== Event Listeners =====

        // أزرار المراسلة في البطاقات
        document.querySelectorAll('.msg-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();

                if (!isAuthenticated) {
                    openLoginModal();
                } else {
                    const freelancerId = this.getAttribute('data-freelancer-id');
                    const freelancerName = this.getAttribute('data-freelancer-name');
                    startNewConversation(freelancerId, freelancerName);
                }
            });
        });

        // إغلاق نموذج الدخول
        if (closeLoginModal) {
            closeLoginModal.addEventListener('click', closeLoginModalFunc);
        }

        if (loginModal) {
            loginModal.addEventListener('click', function(e) {
                if (e.target === loginModal) {
                    closeLoginModalFunc();
                }
            });
        }

        // التحكم في شريط الدردشة
        closeChat.addEventListener('click', closeChatSidebar);
        chatOverlay.addEventListener('click', closeChatSidebar);
        chatFloatingBtn.addEventListener('click', () => {
            if (chatSidebar.classList.contains('translate-x-full')) {
                openChatSidebar(currentConversationId, chatFreelancerName.textContent);
            } else {
                closeChatSidebar();
            }
        });

        chatSidebar.addEventListener('click', function(e) {
            e.stopPropagation();
        });

        // معالجة إرسال الرسالة
        messageForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (message && currentConversationId) {
                addMessageToChat(message, true, true);
                messageInput.value = '';
                messageInput.focus();
            }
        });

        // رابط نموذج الدخول في قسم البطل
        const heroLoginModalLink = document.getElementById('heroLoginModalLink');
        if (heroLoginModalLink) {
            heroLoginModalLink.addEventListener('click', function(e) {
                e.preventDefault();
                openLoginModal();
            });
        }
    });
</script>



@endsection
