<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $conversations = $user->conversations()
            ->with(['latestMessage', 'participants'])
            ->orderByDesc(
                Conversation::select('created_at')
                    ->whereColumn('conversation_id', 'conversations.id')
                    ->orderByDesc('created_at')
                    ->limit(1)
            )
            ->get();

        $users = User::where('id', '!=', $user->id)->get();

        return view('chat.index', compact('conversations', 'users'));
    }

    public function show(Conversation $conversation)
    {
        $user = Auth::user();

        // التحقق من أن المستخدم مشارك في المحادثة
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

        return view('chat.conversation', compact('conversation', 'messages'));
    }
}
