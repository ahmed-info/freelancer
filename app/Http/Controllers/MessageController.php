<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, Conversation $conversation)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $user = Auth::user();

        // التحقق من أن المستخدم مشارك في المحادثة
        if (!$conversation->participants->contains($user->id)) {
            abort(403);
        }

        $message = Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => $user->id,
            'body' => $request->body,
        ]);

        // إعادة تحميل العلاقة للحصول على بيانات المستخدم
        $message->load('user');

        return response()->json([
            'success' => true,
            'message' => $message,
            'html' => view('chat.partials.message', ['message' => $message])->render()
        ]);
    }

    public function getMessages(Conversation $conversation)
    {
        $user = Auth::user();

        if (!$conversation->participants->contains($user->id)) {
            abort(403);
        }

        $messages = $conversation->messages()
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        // تحديث وقت القراءة الأخير
        $conversation->participants()
            ->updateExistingPivot($user->id, ['last_read_at' => now()]);

        return response()->json([
            'messages' => $messages
        ]);
    }
}
