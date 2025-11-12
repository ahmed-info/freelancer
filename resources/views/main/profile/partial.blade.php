<div class="bg-white border-b border-gray-200 mb-6">
    <nav class="flex space-x-8 space-x-reverse">
        @if(Route::is('profile.main'))
                @php
                  $activeLink = 'text-primary border-b-2 border-primary';
                @endphp
            @else
                @php
                  $activeLink = '';
                @endphp
            @endif
        <a href="{{ route('profile.main', $freelancer->id) }}"
            class="text-gray-600 hover:text-primary {{  $activeLink }} py-4 px-2 font-medium">الملف الشخصي</a>



            @if(Route::is('profile.reviews'))
                @php
                  $activeLink = 'text-primary border-b-2 border-primary';
                @endphp
            @else
                @php
                  $activeLink = '';
                @endphp
            @endif
        <a href="{{ route('profile.reviews', $freelancer->id) }}"
            class="{{  $activeLink }} py-4 px-2 font-medium">التقييمات</a>

            @if(Route::is('profile.portfolio'))
                @php
                  $activeLink = 'text-primary border-b-2 border-primary';
                @endphp
            @else
                @php
                  $activeLink = '';
                @endphp
            @endif
        <a href="{{ route('profile.portfolio', $freelancer->id) }}"
            class="text-gray-600 hover:text-primary {{  $activeLink }} py-4 px-2 font-medium">معرض الاعمال</a>
    </nav>
</div>
