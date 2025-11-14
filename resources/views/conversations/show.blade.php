@extends('welcome2')

@section('testcontent')
    <h1>
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
    </h1>

    <div class="card">
        <div class="card-body" style="max-height: 400px; overflow-y: auto;">
            @foreach($conversation->messages as $message)
                <div class="d-flex {{ $message->user_id == Auth::id() ? 'justify-content-end' : 'justify-content-start' }} mb-2">
                    <div class="card {{ $message->user_id == Auth::id() ? 'bg-primary text-white' : 'bg-light' }}" style="max-width: 75%;">
                        <div class="card-body p-2">
                            <p class="card-text mb-1">{{ $message->body }}</p>
                            <small class="d-block">{{ $message->user->name }} - {{ $message->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <form method="POST" action="{{ route('messages.store', $conversation) }}" class="mt-3">
        @csrf
        <div class="input-group">
            <input type="text" name="body" class="form-control" placeholder="اكتب رسالتك..." required>
            <button class="btn btn-primary" type="submit">إرسال</button>
        </div>
    </form>
@endsection
