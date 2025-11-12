<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'freelancer_id',
        'project_id',
        'last_message_at'
    ];

    protected $casts = [
        'last_message_at' => 'datetime'
    ];

    // العلاقة مع المستقل
    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }

    // العلاقة مع العميل
    public function client()
    {
        return $this->belongsTo(User::class, 'project_id');
    }

    // العلاقة مع الرسائل
    public function messages()
    {
        return $this->hasMany(Message::class)->orderBy('created_at', 'asc');
    }

    // آخر رسالة
    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

    // عدد الرسائل غير المقروءة للمستخدم الحالي
    public function unreadCount($userId)
    {
        return $this->messages()
            ->where('sender_id', '!=', $userId)
            ->where('is_read', false)
            ->count();
    }

    // الحصول على الطرف الآخر في المحادثة
    public function getOtherUser($currentUserId)
    {
        if ($this->freelancer_id == $currentUserId) {
            return $this->client;
        }
        return $this->freelancer;
    }
}
