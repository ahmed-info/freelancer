@foreach ($filteredRatings as $rating)
    <div class="border-b border-gray-200 pb-8">
        <div class="flex justify-between items-start mb-4">
            <div class="flex items-start">
                <div class="w-12 h-12 bg-gradient-to-r from-primary to-secondary rounded-full flex items-center justify-center text-white font-bold ml-4 flex-shrink-0">
                    {{ mb_substr($rating->user->name, 0, 1, 'UTF-8') }}
                </div>
                <div>
                    <h4 class="font-bold text-gray-800">{{ $rating->user->name }}</h4>
                    <div class="flex items-center mt-1">
                        <div class="flex text-yellow-400 text-sm">
                            @for ($i = 0; $i < $rating->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                            @for ($i = $rating->rating; $i < 5; $i++)
                                <i class="far fa-star"></i>
                            @endfor
                        </div>
                        <span class="text-gray-500 text-sm mr-2">{{ $rating->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>
            <span class="text-gray-500 text-sm">مشروع: تطوير موقع تجارة إلكترونية</span>
        </div>

        <p class="text-gray-700 mb-4 leading-relaxed">
            {{ $rating->comment }}
        </p>
    </div>
@endforeach

@if($filteredRatings->count() === 0)
    <div class="text-center py-8">
        <i class="far fa-frown text-gray-300 text-4xl mb-2"></i>
        <p class="text-gray-500">لا توجد تقييمات تطابق معايير البحث</p>
    </div>
@endif
