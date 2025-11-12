<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Freelancer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'bio',
        'country',
        'profile_image',
        'member_since',
        'is_verified',
        'is_online',
        'response_rate',
        'response_time',
        'on_time_delivery',
        'rehire_rate',
        'rating',
        'reviews_count',
        'projects_count',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_online' => 'boolean',
        'response_rate' => 'decimal:2',
        'on_time_delivery' => 'decimal:2',
        'rehire_rate' => 'decimal:2',
        'rating' => 'decimal:2',
        'member_since' => 'integer',
    ];

    /**
     * العلاقة مع المستخدم
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * العلاقة مع المهارات
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'freelancer_skills')
            ->withTimestamps();
    }

    /**
     * العلاقة مع الخدمات
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    /**
     * الخدمات النشطة فقط
     */
    public function activeServices(): HasMany
    {
        return $this->hasMany(Service::class)->where('is_active', true);
    }

    /**
     * العلاقة مع المشاريع
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * المشاريع المكتملة فقط
     */
    public function completedProjects(): HasMany
    {
        return $this->hasMany(Project::class)->where('status', 'completed');
    }

    /**
     * العلاقة مع التقييمات
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * الحصول على آخر التقييمات
     */
    public function latestReviews(): HasMany
    {
        return $this->hasMany(Review::class)->latest()->limit(3);
    }

    /**
     * حساب متوسط التقييم
     */
    public function updateRating(): void
    {
        $this->update([
            'rating' => $this->reviews()->avg('rating') ?? 0,
            'reviews_count' => $this->reviews()->count(),
        ]);
    }

    /**
     * تحديث عدد المشاريع
     */
    public function updateProjectsCount(): void
    {
        $this->update([
            'projects_count' => $this->completedProjects()->count(),
        ]);
    }

    /**
     * تنسيق وقت الاستجابة
     */
    public function getFormattedResponseTimeAttribute(): string
    {
        if ($this->response_time < 60) {
            return $this->response_time . ' دقيقة';
        }

        $hours = floor($this->response_time / 60);
        return $hours . ' ساعة' . ($hours > 1 ? '' : '');
    }

    /**
     * الحصول على رابط الصورة الشخصية
     */
    public function getProfileImageUrlAttribute(): string
    {
        return $this->profile_image
            ? asset('storage/' . $this->profile_image)
            : asset('images/default-avatar.png');
    }

    /**
     * Scope للمستقلين الموثقين
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope للمستقلين المتصلين
     */
    public function scopeOnline($query)
    {
        return $query->where('is_online', true);
    }

    /**
     * Scope للمستقلين حسب التقييم
     */
    public function scopeTopRated($query, $minRating = 4.0)
    {
        return $query->where('rating', '>=', $minRating);
    }
}
