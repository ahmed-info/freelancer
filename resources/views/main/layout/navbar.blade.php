<!-- شريط التنقل -->
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    <i class="fas fa-rocket text-primary text-2xl ml-2"></i>
                </div>
                <div class="hidden md:block">
                    <div class="mr-10 flex items-baseline space-x-4 space-x-reverse">
                        <a href="{{ route('home') }}" class="nav-link text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">الرئيسية</a>
                        <a href="{{ route('projects.main') }}" class="nav-link text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">المشاريع</a>
                        <a href="{{ route('freelance.main') }}" class="nav-link text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">اصحاب العمل الحر</a>
                        <a href="{{ route('company.main') }}" class="nav-link text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">الشركات</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center">
                @auth
                    <!-- إذا كان المستخدم مسجل دخول -->
                    @if(auth()->user()->role === 'freelance')
                        <!-- إذا كان مستقل -->
                        <a href="{{ route('freelancer.dashboard') }}" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 transform hover:scale-105">
                            لوحة التحكم
                        </a>
                    @else
                        <!-- إذا كان عميل -->
                        <a href="#" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            لوحة التحكم
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="mr-2">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">
                            تسجيل الخروج
                        </button>
                    </form>
                @else
                    <!-- إذا لم يكن مسجل دخول -->
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition duration-300">تسجيل الدخول</a>
                    <button id="#" class="bg-primary hover:bg-secondary text-white px-4 py-2 rounded-md text-sm font-medium transition duration-300 transform hover:scale-105">
                        انضم إلينا
                    </button>
                @endauth
            </div>
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-primary focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- القائمة المتنقلة -->
    <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg absolute top-16 left-0 w-full z-40">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary block px-3 py-2 rounded-md text-base font-medium transition duration-300">الرئيسية</a>
            <a href="{{ route('projects.main') }}" class="text-gray-700 hover:text-primary block px-3 py-2 rounded-md text-base font-medium transition duration-300">المشاريع</a>
            <a href="{{ route('freelance.main') }}" class="text-gray-700 hover:text-primary block px-3 py-2 rounded-md text-base font-medium transition duration-300">اصحاب العمل الحر</a>
            <div class="border-t border-gray-200 pt-4">
                @auth
                    @if(auth()->user()->role === 'freelance')
                        <a href="{{ route('freelancer.dashboard') }}" class="bg-primary hover:bg-secondary text-white block px-3 py-2 rounded-md text-base font-medium mt-2 transition duration-300 text-center">
                            لوحة التحكم
                        </a>
                    @else
                        <a href="#" class="text-gray-700 hover:text-primary block px-3 py-2 rounded-md text-base font-medium transition duration-300">
                            لوحة التحكم
                        </a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="mt-2">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-primary block px-3 py-2 rounded-md text-base font-medium transition duration-300 w-full text-center">
                            تسجيل الخروج
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary block px-3 py-2 rounded-md text-base font-medium transition duration-300">تسجيل الدخول</a>
                    <button id="joinFreelancerBtnMobile" class="bg-primary hover:bg-secondary text-white block px-3 py-2 rounded-md text-base font-medium mt-2 transition duration-300 w-full text-center">
                        انضم إلينا
                    </button>
                @endauth
            </div>
        </div>
    </div>
</nav>

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
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2 pointer-events-none text-gray-400">
                        <i class="fas fa-chevron-down"></i>
                    </div>
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
@endguest

@guest
<div id="loginModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white animate-fade-in">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-900">تسجيل الدخول</h3>
            <button id="closeModal" class="text-gray-400 hover:text-gray-500">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form action="{{ route('login') }}" method="POST" class="mt-4">
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


<!-- JavaScript -->
<script>
    // فتح وإغلاق القائمة المتنقلة
    document.addEventListener('DOMContentLoaded', function() {

        // التحكم بالـ Modal
        const registerModal = document.getElementById('registerModal');
        const loginModal = document.getElementById('loginModal');

        if (registerModal) {
            const joinFreelancerBtn = document.getElementById('joinFreelancerBtn');
            const joinFreelancerBtnMobile = document.getElementById('joinFreelancerBtnMobile');
            const closeModal = document.getElementById('closeModal');

            function openModal() {
                registerModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeModalFunc() {
                registerModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // فتح Modal عند الضغط على "انضم كمقدم خدمة"
            if (joinFreelancerBtn) {
                joinFreelancerBtn.addEventListener('click', openModal);
            }

            if (joinFreelancerBtnMobile) {
                joinFreelancerBtnMobile.addEventListener('click', openModal);
            }

            // إغلاق Modal
            if (closeModal) {
                closeModal.addEventListener('click', closeModalFunc);
            }

            // إغلاق عند الضغط خارج المحتوى
            registerModal.addEventListener('click', (e) => {
                if (e.target === registerModal) {
                    closeModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !registerModal.classList.contains('hidden')) {
                    closeModalFunc();
                }
            });
        }

        if (loginModal) {
            const loginBtn = document.getElementById('loginBtn');
            const loginBtnMobile = document.getElementById('loginBtnMobile');
            const closeModal = document.getElementById('closeModal');

            function openModal() {
                loginModal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeModalFunc() {
                loginModal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }

            // فتح Modal عند الضغط على "انضم كمقدم خدمة"
            if (loginBtn) {
                loginBtn.addEventListener('click', openModal);
            }

            if (loginBtnMobile) {
                loginBtnMobile.addEventListener('click', openModal);
            }

            // إغلاق Modal
            if (closeModal) {
                closeModal.addEventListener('click', closeModalFunc);
            }

            // إغلاق عند الضغط خارج المحتوى
            loginModal.addEventListener('click', (e) => {
                if (e.target === loginModal) {
                    closeModalFunc();
                }
            });

            // إغلاق عند الضغط على ESC
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !loginModal.classList.contains('hidden')) {
                    closeModalFunc();
                }
            });
        }
    });
</script>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }

    /* تحسينات للشريط اللاصق */
    .sticky {
        position: sticky;
        top: 0;
    }

    /* تحسينات للروابط */
    .nav-link {
        position: relative;
    }

    .nav-link:hover::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 2px;
        background-color: currentColor;
        transition: width 0.3s ease;
    }
</style>

