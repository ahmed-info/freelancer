<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    // عرض قائمة المحادثات
    public function index()
    {
        $userId = Auth::id();

        $conversations = Conversation::where('freelancer_id', $userId)
            ->orWhere('project_id', $userId)
            ->with(['freelancer', 'client', 'lastMessage'])
            ->orderBy('last_message_at', 'desc')
            ->get();

        return view('messages.index', compact('conversations'));
    }

    // عرض محادثة محددة
    public function show($id)
    {
        $userId = Auth::id();

        $conversation = Conversation::with(['freelancer', 'client', 'messages.sender'])
            ->findOrFail($id);

        // التحقق من أن المستخدم طرف في المحادثة
        if ($conversation->freelancer_id != $userId && $conversation->project_id != $userId) {
            abort(403, 'غير مصرح لك بالوصول إلى هذه المحادثة');
        }

        // تحديد جميع الرسائل كمقروءة
        $conversation->messages()
            ->where('sender_id', '!=', $userId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('messages.show', compact('conversation'));
    }

    // بدء محادثة جديدة أو فتح محادثة موجودة
    public function start($freelancerId)
    {
        $userId = Auth::id();

        // البحث عن محادثة موجودة
        $conversation = Conversation::where(function($query) use ($userId, $freelancerId) {
            $query->where('freelancer_id', $freelancerId)
                  ->where('project_id', $userId);
        })->orWhere(function($query) use ($userId, $freelancerId) {
            $query->where('freelancer_id', $userId)
                  ->where('project_id', $freelancerId);
        })->first();

        // إذا لم توجد محادثة، قم بإنشاء واحدة جديدة
        if (!$conversation) {
            $conversation = Conversation::create([
                'freelancer_id' => $freelancerId,
                'project_id' => $userId,
                'last_message_at' => now()
            ]);
        }

        return redirect()->route('messages.show', $conversation->id);
    }

    // إرسال رسالة
    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:5000'
        ]);

        $userId = Auth::id();

        $conversation = Conversation::findOrFail($id);

        // التحقق من أن المستخدم طرف في المحادثة
        if ($conversation->freelancer_id != $userId && $conversation->project_id != $userId) {
            abort(403, 'غير مصرح لك بإرسال رسالة في هذه المحادثة');
        }

        // إنشاء الرسالة
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $userId,
            'message' => $request->message,
            'is_read' => false
        ]);

        // تحديث وقت آخر رسالة
        $conversation->update([
            'last_message_at' => now()
        ]);

        return response()->json([
            'success' => true,
            'message' => $message->load('sender')
        ]);
    }

    // حذف محادثة
    public function destroy($id)
    {
        $userId = Auth::id();

        $conversation = Conversation::findOrFail($id);

        // التحقق من أن المستخدم طرف في المحادثة
        if ($conversation->freelancer_id != $userId && $conversation->project_id != $userId) {
            abort(403, 'غير مصرح لك بحذف هذه المحادثة');
        }

        $conversation->delete();

        return redirect()->route('messages.index')->with('success', 'تم حذف المحادثة بنجاح');
    }
}
