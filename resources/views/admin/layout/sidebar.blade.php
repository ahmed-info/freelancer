<style>
    .myactive {
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
            @if (Route::is('fields.*'))
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
                    <i class="bx bx-grid-alt"></i>
                </div>
                <div class="menu-title">المجالات المتاحة</div>
            </a>
        </li>

        <li>
            @if (Route::is('projects.*'))
                {{-- @if (Request::path() == 'articles') --}}
                @php
                    $myactive = 'myactive';
                @endphp
            @else
                @php
                    $myactive = '';
                @endphp
            @endif
            <a href="{{ route('projects.index') }}" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-task"></i>
                </div>
                <div class="menu-title">المشاريع</div>
            </a>
        </li>

        <li>
            @if (Route::is('specializations.*'))
                @php
                    $myactive = 'myactive';
                @endphp
            @else
                @php
                    $myactive = '';
                @endphp
            @endif
            <a href="{{ route('specializations.index') }}" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-id-card"></i>
                </div>
                <div class="menu-title">التخصصات والمسميات الوظيفية</div>
            </a>
        </li>

        <li>
            @if (Route::is('freelancers.*'))
                @php
                    $myactive = 'myactive';
                @endphp
            @else
                @php
                    $myactive = '';
                @endphp
            @endif
            <a href="{{ route('freelancers.admin.index') }}" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-user-pin"></i>
                </div>
                <div class="menu-title">اصحاب العمل الحر</div>
            </a>
        </li>

        <li>
            @if (Route::is('companies.*'))
                @php
                    $myactive = 'myactive';
                @endphp
            @else
                @php
                    $myactive = '';
                @endphp
            @endif
            <a href="{{ route('companies.index') }}" class="{{ $myactive }}">
                <div class="parent-icon">
                    <i class="bx bx-buildings"></i>
                </div>
                <div class="menu-title">الشركات</div>
            </a>
        </li>


        <li>
            @if (Route::is('socialmedia.*'))
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
                    <i class="bx bx-group"></i>
                </div>
                <div class="menu-title">تواصل اجتماعي</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
