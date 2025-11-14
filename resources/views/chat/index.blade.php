@extends('welcome2')

@section('title', 'المحادثات')

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
                @forelse($conversations as $conversation)
                    <a href="{{ route('chat.show', $conversation) }}"
                       class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">
                                @if($conversation->type === 'direct')
                                    @php
                                        $otherUser = $conversation->participants->where('id', '!=', Auth::id())->first();
                                    @endphp
                                    {{ $otherUser->name }}
                                    <small class="text-muted">({{ $otherUser->role }})</small>
                                @else
                                    {{ $conversation->title ?? 'مجموعة بدون عنوان' }}
                                @endif
                            </div>
                            @if($conversation->latestMessage)
                                <small class="text-muted">
                                    {{ Str::limit($conversation->latestMessage->body, 30) }}
                                </small>
                            @else
                                <small class="text-muted">لا توجد رسائل</small>
                            @endif
                        </div>
                        <span class="badge bg-primary rounded-pill">
                            {{ $conversation->messages_count ?? 0 }}
                        </span>
                    </a>
                @empty
                    <div class="list-group-item text-center text-muted">
                        لا توجد محادثات
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- منطقة المحادثة -->
    <div class="col-md-8">
        <div class="card h-100">
            <div class="card-body d-flex align-items-center justify-content-center">
                <div class="text-center text-muted">
                    <i class="fas fa-comments fa-3x mb-3"></i>
                    <h5>اختر محادثة لبدء الدردشة</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- نموذج إنشاء محادثة جديدة -->
<div class="modal fade" id="newConversationModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">بدء محادثة جديدة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('conversations.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">عنوان المحادثة (للمجموعات)</label>
                        <input type="text" class="form-control" id="title" name="title"
                               placeholder="اختياري - للمحادثات الجماعية فقط">
                    </div>
                    <div class="mb-3">
                        <label for="user_ids" class="form-label">اختر المستخدمين</label>
                        <select multiple class="form-select" id="user_ids" name="user_ids[]" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }} - ({{ $user->role }})
                                </option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">
                            اضغط على Ctrl لاختيار أكثر من مستخدم للمحادثات الجماعية
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">بدء المحادثة</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
