<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'freelancer_id',
        'title',
        'description',
        'price',
        'delivery_days',
        'is_active',
        'orders_count',
        'rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'rating' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * العلاقة مع المستقل
     */
    public function freelancer(): BelongsTo
    {
        return $this->belongsTo(Freelancer::class);
    }

    /**
     * Scope للخدمات النشطة
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * تنسيق عدد الأيام
     */
    public function getFormattedDeliveryDaysAttribute(): string
    {
        return $this->delivery_days . ' ' . ($this->delivery_days > 10 ? 'يوم' : 'أيام');
    }
}
