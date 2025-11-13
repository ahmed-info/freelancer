@extends('main.layout.layout')
@section('main_content')


<!-- Modal تسجيل Rgister -->

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
            <button id="closeModal" class="text-gray-400 hover:text-gray-500">
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
                        <a href="#" id="loginModalLink" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-6 rounded-lg text-center transition duration-300 transform hover:scale-105 animate-pulse-glow">ابدأ كمقدم خدمة</a>
                     @endif
                    </div>
                </div>
                {{-- <div class="md:w-1/2 flex justify-center animate-slide-up">
                    <div class="relative rotate-3">
                        <div class="bg-white rounded-2xl shadow-2xl p-6 w-80 transform rotate-3 animate-float">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-3">
                                    م
                                </div>
                                <div class="mr-3">
                                    <h3 class="font-bold text-gray-800">محمد أحمد</h3>
                                    <p class="text-gray-600 text-sm">مطور ويب متكامل</p>
                                </div>
                            </div>
                            <div class="flex mb-4">
                                <div class="flex text-yellow-400">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-gray-600 text-sm mr-2">(4.7)</span>
                            </div>
                            <p class="text-gray-700 mb-4">مطور ويب بخبرة 5 سنوات، متخصص في تطوير تطبيقات الويب والتجارة الإلكترونية باستخدام أحدث التقنيات.</p>
                            <div class="flex flex-wrap">
                                <span class="skill-tag">HTML/CSS</span>
                                <span class="skill-tag">JavaScript</span>
                                <span class="skill-tag">React</span>
                                <span class="skill-tag">Node.js</span>
                            </div>
                        </div>
                        <div class="absolute -top-4 -right-4 bg-accent text-white py-1 px-3 rounded-full text-sm font-bold animate-bounce-slow">
                            متاح للعمل
                        </div>
                    </div>
                </div> --}}
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

    <!-- قسم عرض فرصةين -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 animate-fade-in-up">اكتشف أفضل المواهب العربية</h2>
                    <p class="text-gray-600 animate-fade-in-up" style="animation-delay: 0.2s">تصفح آلاف فرصةين الموهوبين وابحث عن المناسب لمشروعك</p>
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
                <!-- بطاقة مستقل 1 -->

                @foreach ($freelancers as $freelancer)
                 <div class="freelancer-card bg-white rounded-xl shadow-md overflow-hidden animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="p-6">
                            <div class="flex items-start mb-4">
                                <div class="w-16 h-16 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold text-xl ml-4">
                                    {{ substr($freelancer->user->name, 0, 1)}}
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

                            <div class="flex justify-between items-center">

                                <a href="{{ route('profile.main', ['id' => $freelancer->id]) }}" class="bg-primary hover:bg-secondary text-white py-2 px-4 rounded-lg text-sm transition duration-300 transform hover:scale-105">
                                    عرض مشاريع مماثلة
                                </a>
                                <a href="{{ route('messages.start', ['freelancerId' => $freelancer->id]) }}"
   class="bg-lime-500 hover:bg-lime-600 text-white py-2 px-4 rounded-lg text-sm transition duration-300 transform hover:scale-105 flex items-center">
    <i class="fas fa-envelope ml-2"></i>
    مراسلة
</a>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>

            <div class="text-center mt-12">
                <a href="#" class="bg-primary hover:bg-secondary text-white font-bold py-3 px-8 rounded-lg inline-flex items-center transition duration-300 transform hover:scale-105 animate-pulse-glow">
                    عرض المزيد من اصحاب العمل الحر
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
                    <p class="text-gray-600">جميع فرصةين في منصتنا خضعوا لمراجعة ملفاتهم وتقييماتهم لضمان جودة عملهم</p>
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
            <p class="text-xl mb-8 text-blue-100 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 0.2s">انضم إلى آلاف فرصةين العرب وابدأ في كسب المال من مهاراتك عبر الإنترنت</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse">
                <a href="{{ route('profile.freelancer.create') }}" class="bg-white text-primary hover:bg-gray-100 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 animate-pulse-glow">انضم كصاحب عمل حر</a>
                <a href="#" class="bg-transparent border-2 border-white hover:bg-white hover:text-primary font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">اعرف المزيد</a>
            </div>
        </div>
    </section>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    // فتح modal تسجيل الدخول
    const loginLink = document.getElementById('loginModalLink');
    const loginModal = document.getElementById('loginModal');

    if (loginLink && loginModal) {
        loginLink.addEventListener('click', function(e) {
            e.preventDefault();
            loginModal.classList.remove('hidden');
        });
    }

    // إغلاق modal تسجيل الدخول
    const closeLoginModal = loginModal?.querySelector('#closeModal');
    if (closeLoginModal) {
        closeLoginModal.addEventListener('click', function() {
            loginModal.classList.add('hidden');
        });
    }

    // إغلاق modal عند النقر خارج المحتوى
    if (loginModal) {
        loginModal.addEventListener('click', function(e) {
            if (e.target === loginModal) {
                loginModal.classList.add('hidden');
            }
        });
    }
});
</script>
