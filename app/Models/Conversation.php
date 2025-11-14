<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type'];

    public function participants()
    {
        return $this->belongsToMany(User::class, 'conversation_participants')
                    ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latest();
    }

    public function addParticipant($userId)
    {
        return $this->participants()->attach($userId);
    }

    public function removeParticipant($userId)
    {
        return $this->participants()->detach($userId);
    }
}
