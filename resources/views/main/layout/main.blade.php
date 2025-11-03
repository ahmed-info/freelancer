<!DOCTYPE html>
<html lang="ar" dir="rtl">
@include('main.layout.head')
<body class="font-arabic">
    <!-- شريط التقدم -->
    <div class="progress-bar" id="progress-bar"></div>

    <!-- زر العودة للأعلى -->
    <div class="scroll-top" id="scroll-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- شريط التنقل -->
   @include('main.layout.navbar')

  @yield('content')

    @include('main.layout.footer')

    @include('main.layout.script_js')
</body>
</html>
