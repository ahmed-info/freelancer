<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'budget_type',      // fixed أو hourly
        'budget_amount',    // للمشاريع ذات الميزانية المحددة
        'hourly_rate',      // السعر بالساعة
        'duration',         // مدة المشروع
        'status',           // draft, published, in_progress, completed, cancelled
        'skills',           // JSON array للمهارات المطلوبة
        'attachments',      // JSON array للملفات المرفقة
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'skills' => 'array',
        'attachments' => 'array',
        'budget_amount' => 'decimal:2',
        'hourly_rate' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the user that owns the project.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all proposals for the project.
     */
    public function proposals()
    {
        return $this->hasMany(Proposal::class);
    }

    /**
     * Scope a query to only include published projects.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include draft projects.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Get the budget display string.
     */
    public function getBudgetDisplayAttribute()
    {
        return number_format($this->budget_amount) . 'دينار';

    }

    /**
     * Get the duration display string.
     */
    public function getDurationDisplayAttribute()
    {
        $durations = [
            '1' => 'أقل من أسبوع',
            '2' => 'أسبوع - أسبوعين',
            '3' => 'أسبوعين - شهر',
            '4' => 'شهر - 3 أشهر',
            '5' => 'أكثر من 3 أشهر',
        ];

        return $durations[$this->duration] ?? 'غير محدد';
    }

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

    protected function getBudgetTypeDisplayAttribute()
    {
        return $this->budget_type === 'fixed' ? 'ميزانية ثابتة' : 'ميزانية بالساعة';
    }
}
