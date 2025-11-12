<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * العلاقة مع المستقل
     */
    public function freelancer(): BelongsTo
    {
        return $this->belongsTo(Freelancer::class);
    }

    /**
     * العلاقة مع المشروع
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * العلاقة مع العميل
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * عند إنشاء تقييم جديد، تحديث تقييم المستقل
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($review) {
            $review->freelancer->updateRating();
        });

        static::updated(function ($review) {
            $review->freelancer->updateRating();
        });

        static::deleted(function ($review) {
            $review->freelancer->updateRating();
        });
    }

    /**
     * الحصول على التاريخ بصيغة منذ
     */
    public function getTimeAgoAttribute(): string
    {
        return $this->created_at->diffForHumans();
    }
}
