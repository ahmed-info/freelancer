@php
    $isSent = $message->user_id == Auth::id();
@endphp

<div class="d-flex mb-3 {{ $isSent ? 'justify-content-end' : 'justify-content-start' }}">
    <div class="message-bubble {{ $isSent ? 'message-sent' : 'message-received' }}">
        <div class="card {{ $isSent ? 'bg-primary text-white' : 'bg-light' }}">
            <div class="card-body p-2">
                @if(!$isSent && $conversation->type === 'group')
                    <div class="fw-bold small">
                        {{ $message->user->name }}
                        <span class="badge bg-secondary">{{ $message->user->role }}</span>
                    </div>
                @endif
                <p class="card-text mb-1">{{ $message->body }}</p>
                <small class="{{ $isSent ? 'text-white-50' : 'text-muted' }}">
                    {{ $message->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </div>
</div>
