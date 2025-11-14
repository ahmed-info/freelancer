@extends('welcome2')

@section('title', $conversation->title ?? 'المحادثة')

@section('testcontent')
<div class="row chat-container">
    <!-- قائمة المحادثات -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">المحادثات</h5>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newConversationModal">
                    <i class="fas fa-plus"></i> محادثة جديدة
                </button>
            </div>
            <div class="conversation-list">
                @foreach(Auth::user()->conversations as $conv)
                    <a href="{{ route('chat.show', $conv) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-start
                              {{ $conv->id == $conversation->id ? 'active' : '' }}">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                @if($conv->type === 'direct')
                                    @php
                                        $otherUser = $conv->participants->where('id', '!=', Auth::id())->first();
                                    @endphp
                                    {{ $otherUser->name }}
                                    <small>({{ $otherUser->role }})</small>
                                @else
                                    {{ $conv->title ?? 'مجموعة بدون عنوان' }}
                                @endif
                            </div>
                            @if($conv->latestMessage)
                                <small class="{{ $conv->id == $conversation->id ? '' : 'text-muted' }}">
                                    {{ Str::limit($conv->latestMessage->body, 30) }}
                                </small>
                            @endif
                        </div>
                        <span class="badge bg-primary rounded-pill">
                            {{ $conv->messages_count ?? 0 }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- منطقة المحادثة -->
    <div class="col-md-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">
                        @if($conversation->type === 'direct')
                            @php
                                $otherUser = $conversation->participants->where('id', '!=', Auth::id())->first();
                            @endphp
                            {{ $otherUser->name }}
                            <span class="badge bg-secondary">{{ $otherUser->role }}</span>
                        @else
                            {{ $conversation->title ?? 'مجموعة بدون عنوان' }}
                            <small class="text-muted">
                                ({{ $conversation->participants->count() }} أعضاء)
                            </small>
                        @endif
                    </h5>
                </div>
                <div>
                    <form action="{{ route('conversations.destroy', $conversation) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger"
                                onclick="return confirm('هل أنت متأكد من مغادرة المحادثة؟')">
                            <i class="fas fa-sign-out-alt"></i> مغادرة
                        </button>
                    </form>
                </div>
            </div>

            <div class="messages-container">
                <!-- الرسائل -->
                <div class="messages" id="messages-container">
                    @foreach($messages as $message)
                        @include('chat.partials.message', ['message' => $message])
                    @endforeach
                </div>

                <!-- إدخال الرسالة -->
                <div class="message-input">
                    <form id="message-form">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="body" class="form-control"
                                   placeholder="اكتب رسالتك هنا..." id="message-input" required>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> إرسال
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    const conversationId = {{ $conversation->id }};
    const messagesContainer = $('#messages-container');
    const messageForm = $('#message-form');
    const messageInput = $('#message-input');

    // تمرير لأسفل تلقائيًا
    function scrollToBottom() {
        messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
    }

    scrollToBottom();

    // إرسال رسالة
    messageForm.on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        $.ajax({
            url: '{{ route("messages.store", $conversation) }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    messagesContainer.append(response.html);
                    messageInput.val('');
                    scrollToBottom();
                }
            },
            error: function(xhr) {
                alert('حدث خطأ أثناء إرسال الرسالة');
            }
        });
    });

    // تحديث الرسائل تلقائيًا كل 3 ثوانٍ
    function fetchMessages() {
        $.get('{{ route("messages.get", $conversation) }}', function(response) {
            const currentMessageCount = messagesContainer.children().length;

            if (response.messages.length !== currentMessageCount) {
                messagesContainer.empty();

                response.messages.forEach(function(message) {
                    $.get('{{ url("chat/partials/message") }}', { message_id: message.id }, function(html) {
                        messagesContainer.append(html);
                    });
                });

                scrollToBottom();
            }
        });
    }

    // تحديث كل 3 ثوانٍ
    setInterval(fetchMessages, 3000);
});
</script>
@endpush
