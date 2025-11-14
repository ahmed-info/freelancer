<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
            'title' => 'nullable|string|max:255',
        ]);

        $currentUser = Auth::user();
        $userIds = array_merge([$currentUser->id], $request->user_ids);

        // البحث عن محادثة موجودة بين نفس المستخدمين
        $existingConversation = $this->findExistingConversation($userIds);

        if ($existingConversation) {
            return redirect()->route('chat.show', $existingConversation);
        }

        $conversation = Conversation::create([
            'title' => $request->title,
            'type' => count($userIds) > 2 ? 'group' : 'direct',
        ]);

        $conversation->participants()->attach($userIds);

        return redirect()->route('chat.show', $conversation)
            ->with('success', 'تم إنشاء المحادثة بنجاح');
    }

    private function findExistingConversation($userIds)
    {
        return Conversation::whereHas('participants', function ($query) use ($userIds) {
            $query->whereIn('user_id', $userIds);
        }, '=', count($userIds))
        ->whereHas('participants', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->first();
    }

    public function destroy(Conversation $conversation)
    {
        $user = Auth::user();

        if (!$conversation->participants->contains($user->id)) {
            abort(403);
        }

        $conversation->participants()->detach($user->id);

        // إذا لم يتبقى أي مشاركين، احذف المحادثة
        if ($conversation->participants()->count() === 0) {
            $conversation->delete();
        }

        return redirect()->route('chat.index')
            ->with('success', 'تم مغادرة المحادثة بنجاح');
    }
}
