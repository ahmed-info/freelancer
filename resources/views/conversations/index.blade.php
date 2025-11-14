@extends('welcome2')

@section('testcontent')
        <h1>المحادثات</h1>

    @if($conversations->count() > 0)
        <div class="list-group">
            @foreach($conversations as $conversation)
                <a href="{{ route('conversations.show', $conversation) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                            @if($conversation->title)
                                {{ $conversation->title }}
                            @else
                                محادثة مع
                                @foreach($conversation->users as $user)
                                    @if($user->id != Auth::id())
                                        {{ $user->name }}@if(!$loop->last), @endif
                                    @endif
                                @endforeach
                            @endif
                        </h5>
                        <small>{{ $conversation->updated_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-1">
                        @if($conversation->messages->last())
                            {{ Str::limit($conversation->messages->last()->body, 50) }}
                        @else
                            لا توجد رسائل
                        @endif
                    </p>
                </a>
            @endforeach
        </div>
    @else
        <p>لا توجد محادثات.</p>
    @endif
@endsection
