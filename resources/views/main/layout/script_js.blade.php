<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

@if (Session::has('status'))
        <script>
            toastr.success("{{ Session::get('status') }}");
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif


<script>
    // تفعيل القائمة المتنقلة
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('open');
    });

    // تأثير التمرير السلس للروابط
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') {
                e.preventDefault();
                return;
            }
            const target = document.querySelector(href);
            if (target) {
                // تنفيذ الإجراء المطلوب
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }

            e.preventDefault();
        });
    });

    // إضافة تأثير الظهور عند التمرير
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
                // إضافة تأثيرات مختلفة بناءً على نوع العنصر
                if (entry.target.classList.contains('card-hover')) {
                    entry.target.style.animationDelay = Math.random() * 0.5 + 's';
                }
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card-hover, .animate-fade-in-up, .animate-slide-in-left, .animate-slide-in-right')
        .forEach(el => {
            observer.observe(el);
        });

    // شريط التقدم
    window.addEventListener('scroll', function() {
        const winHeight = window.innerHeight;
        const docHeight = document.documentElement.scrollHeight;
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const scrollPercent = (scrollTop / (docHeight - winHeight)) * 100;
        document.getElementById('progress-bar').style.width = scrollPercent + '%';

        // إظهار/إخفاء زر العودة للأعلى
        const scrollTopBtn = document.getElementById('scroll-top');
        if (scrollTop > 300) {
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.classList.remove('show');
        }
    });

    // زر العودة للأعلى
    document.getElementById('scroll-top').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // تأثيرات إضافية عند تحميل الصفحة
    window.addEventListener('load', function() {
        // إضافة تأثيرات للمحتوى الرئيسي
        document.querySelectorAll('.typewriter').forEach(el => {
            el.style.animation = 'typing 3.5s steps(40, end), blink-caret .75s step-end infinite';
        });
    });
</script>



