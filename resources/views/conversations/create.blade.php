@extends('welcome2')

@section('testcontent')
    <h1>بدء محادثة جديدة</h1>

    <form method="POST" action="{{ route('conversations.store') }}">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">عنوان المحادثة (اختياري)</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="mb-3">
            <label for="user_ids" class="form-label">اختر المستخدمين</label>
            <select multiple class="form-select" id="user_ids" name="user_ids[]" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                @endforeach
            </select>
            <small class="form-text text-muted">اضغط على Ctrl لاختيار أكثر من مستخدم.</small>
        </div>

        <button type="submit" class="btn btn-primary">بدء المحادثة</button>
    </form>
@endsection
