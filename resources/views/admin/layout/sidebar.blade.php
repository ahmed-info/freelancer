<style>
     .myactive{
        color: #008cff !important;
	text-decoration: none;
	background: rgb(13 110 253 / .12) !important
     }
</style>
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">

        <div>
            <h6 class="">فري لانسر</h6>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'mm-active' : '' }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">الصفحة الرئيسية</div>
            </a>

        </li>


        <li>
            @if(Route::is('sections.*'))

                @php
                  $myactive = 'myactive';
                @endphp
            @else
                @php
                $myactive = '';

                @endphp
            @endif
            <a href="{{ route('fields.index') }}" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">المجالات المتاحة</div>
            </a>
        </li>

        <li>
            @if(Route::is('articles.*'))
            {{-- @if(Request::path() == 'articles') --}}
                @php
                  $myactive = 'myactive';
                @endphp
            @else
                @php
                  $myactive = '';
                @endphp
            @endif
            <a href="#" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الأخبار</div>
            </a>
        </li>

        <li>
            @if(Route::is('breaking-news.*'))
                @php
                  $myactive = 'myactive';
                @endphp
            @else
                @php
                  $myactive = '';
                @endphp
            @endif
            <a href="#" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الأخبار العاجلة</div>
            </a>
        </li>

        <li>
            @if(Route::is('ads.*'))
                @php
                  $myactive = 'myactive';
                @endphp
            @else
                @php
                  $myactive = '';
                @endphp
            @endif
            <a href="#" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الأعلانات</div>
            </a>
        </li>


        <li>
            @if(Route::is('socialmedia.*'))
                @php
                  $active = 'mm-active';
                @endphp
            @else
                @php
                   $active = '';
                @endphp
            @endif
            <a href="#" class="{{ $active }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">تواصل اجتماعي</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
