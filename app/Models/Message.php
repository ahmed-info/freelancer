<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'sender_id',
        'message',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean'
    ];

    // العلاقة مع المحادثة
    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }

    // العلاقة مع المرسل
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // تحديد ما إذا كانت الرسالة للمستخدم الحالي
    public function isMine($userId)
    {
        return $this->sender_id == $userId;
    }
}
