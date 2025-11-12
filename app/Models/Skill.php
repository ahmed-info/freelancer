<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * العلاقة مع المستقلين
     */
    public function freelancers(): BelongsToMany
    {
        return $this->belongsToMany(Freelancer::class, 'freelancer_skills')
            ->withTimestamps();
    }

    /**
     * توليد الـ slug تلقائياً
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($skill) {
            if (empty($skill->slug)) {
                $skill->slug = Str::slug($skill->name);
            }
        });
    }
}