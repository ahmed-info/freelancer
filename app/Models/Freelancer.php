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

    protected $guarded = [];

    protected $casts = [
        'skills' => 'array',
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
    // public function skills(): BelongsToMany
    // {
    //     return $this->belongsToMany(Skill::class, 'freelancer_skills')
    //         ->withTimestamps();
    // }

    protected function skills(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                // إذا كانت القيمة null أو فارغة
                if (is_null($value) || $value === '') {
                    return [];
                }

                // إذا كانت $value هي سلسلة، حاول تحويلها من JSON
                if (is_string($value)) {
                    // إزالة الشرط المائلة الإضافية إذا كانت موجودة
                    $value = stripslashes($value);
                    $decoded = json_decode($value, true);

                    if (json_last_error() === JSON_ERROR_NONE) {
                        // إذا كان decode ناجحًا وكانت النتيجة مصفوفة
                        if (is_array($decoded)) {
                            $decodedSkills = [];
                            foreach ($decoded as $skill) {
                                if (is_string($skill)) {
                                    // فك ترميز Unicode
                                    $decodedSkill = json_decode('"'.$skill.'"');
                                    $decodedSkills[] = $decodedSkill ?: $skill;
                                } else {
                                    $decodedSkills[] = $skill;
                                }
                            }

                            return $decodedSkills;
                        }
                    }

                    // إذا فشل تحويل JSON، حاول فك ترميز السلسلة مباشرة
                    $decodedValue = json_decode('"'.$value.'"');
                    if ($decodedValue !== null) {
                        return [$decodedValue];
                    }

                    return [$value];
                }

                // إذا كانت $value مصفوفة بالفعل، قم بفك ترميز كل عنصر
                if (is_array($value)) {
                    $decodedSkills = [];
                    foreach ($value as $skill) {
                        if (is_string($skill)) {
                            $decodedSkill = json_decode('"'.$skill.'"');
                            $decodedSkills[] = $decodedSkill ?: $skill;
                        } else {
                            $decodedSkills[] = $skill;
                        }
                    }

                    return $decodedSkills;
                }

                return [];
            },
            set: function ($value) {
                // إذا كانت القيمة مصفوفة، نحولها إلى JSON
                if (is_array($value)) {
                    return json_encode($value, JSON_UNESCAPED_UNICODE);
                }

                return $value;
            }
        );
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
