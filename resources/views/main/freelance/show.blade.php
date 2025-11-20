@extends('main.layout.layout')
@section('main_content')
    {{-- عرض متوسط التقييم وعدد التقييمات --}}
<div>
    <h4>التقييمات</h4>
    <p>متوسط التقييم: {{ $freelancer->averageRating() }} ({{ $freelancer->ratingsCount() }} تقييم)</p>
</div>

{{-- عرض تقييمات المستخدمين --}}
@foreach($freelancer->ratings as $rating)
    <div>
        <strong>{{ $rating->user->name }}</strong>
        <span>التقييم: {{ $rating->rating }}</span>
        <p>{{ $rating->comment }}</p>
        <small>{{ $rating->created_at->diffForHumans() }}</small>

        {{-- إذا كان المستخدم الحالي هو صاحب التقييم نعرض أزرار التعديل والحذف --}}
        @auth
            @if(Auth::id() == $rating->user_id)
                <button class="edit-rating bg-green-500 px-2 py-1 rounded-sm" data-rating-id="{{ $rating->id }}">تعديل</button>
                <form action="{{ route('ratings.destroy', $rating) }}" method="POST" style="display:inline;" class="bg-red-500 px-2 py-1 rounded-sm">
                    @csrf
                    @method('DELETE')
                    <button type="submit">حذف</button>
                </form>
            @endif
        @endauth
    </div>
@endforeach

{{-- نموذج إضافة تقييم --}}
@auth
    {{-- إذا كان المستخدم لم يقم بتقييم هذا المنشور من قبل --}}
    @if(!$freelancer->ratings->where('user_id', Auth::id())->count())
        <form action="{{ route('ratings.store', $freelancer) }}" method="POST">
            @csrf
            <div>
                <label for="rating">تقييمك (من 1 إلى 5):</label>
                <select name="rating" id="rating" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <label for="comment">تعليق (اختياري):</label>
                <textarea name="comment" id="comment" rows="3"></textarea>
            </div>
            <button type="submit">إرسال التقييم</button>
        </form>
    @else
        <p>لقد قمت بتقييم هذا المنشور مسبقاً.</p>
    @endif
@else
    <p><a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-600 transition-colors duration-200">سجل الدخول</a> لتقيم هذا المنشور.</p>
@endauth
@endsection
