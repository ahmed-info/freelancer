<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
        // بدء محادثة جديدة أو إرجاع المحادثة الحالية
    public function startConversation(Request $request)
    {
        $request->validate([
            'freelancer_id' => 'required|exists:users,id'
        ]);

        $clientId = Auth::id();
        $freelancerId = $request->freelancer_id;

        // تحقق إذا كانت هناك محادثة موجودة بالفعل
        $conversation = Conversation::where(function ($query) use ($clientId, $freelancerId) {
            $query->where('user1_id', $clientId)
                  ->where('user2_id', $freelancerId);
        })->orWhere(function ($query) use ($clientId, $freelancerId) {
            $query->where('user1_id', $freelancerId)
                  ->where('user2_id', $clientId);
        })->first();

        if (!$conversation) {
            $conversation = Conversation::create([
                'user1_id' => $clientId,
                'user2_id' => $freelancerId
            ]);
        }

        return response()->json([
            'conversation_id' => $conversation->id,
            'freelancer_name' => User::find($freelancerId)->name
        ]);
    }

    // إرسال رسالة
    public function sendMessage(Request $request)
    {
        $request->validate([
            'conversation_id' => 'required|exists:conversations,id',
            'message' => 'required|string'
        ]);

        $message = Message::create([
            'conversation_id' => $request->conversation_id,
            'sender_id' => Auth::id(),
            'message' => $request->message
        ]);

        // يمكن إضافة event للبث هنا إذا أردت

        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    // جلب الرسائل في محادثة
    public function getMessages($conversationId)
    {
        $messages = Message::where('conversation_id', $conversationId)
            ->with('sender')
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }

    // جلب المحادثات للمستخدم الحالي
    public function getConversations()
    {
        $userId = Auth::id();

        $conversations = Conversation::where('user1_id', $userId)
            ->orWhere('user2_id', $userId)
            ->with(['user1', 'user2', 'messages' => function ($query) {
                $query->orderBy('created_at', 'desc')->limit(1);
            }])
            ->get();

        return response()->json($conversations);
    }
}
