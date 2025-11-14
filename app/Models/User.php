<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Project;
use App\Models\Company;
use App\Models\Proposal;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class, 'conversation_participants')
                    ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }



    public function isCompany()
    {
        return $this->role === 'company';
    }


    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isFreelance(): bool
    {
        return $this->role === 'freelance';
    }

    public function isProject(): bool
    {
        return $this->role === 'project';
    }


public function isEligibleForChat(): bool
    {
        return in_array($this->role, ['freelance', 'project', 'company']);
    }
}
