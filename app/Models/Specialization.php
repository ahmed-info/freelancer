<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Myjob;
class Specialization extends Model
{
    //use HasFactory;

    protected $fillable = [
        'name'
    ];

    /**
     * Get all myjobs for this specialization
     */
    public function myjobs()
    {
        return $this->hasMany(Myjob::class);
    }

    /**
     * Get jobs count
     */
    public function getMyjobsCountAttribute()
    {
        return $this->myjobs()->count();
    }

    /**
     * Scope: Search by name
     */
    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'like', "%{$name}%");
    }

    /**
     * Get specialization with myjobs
     */
    public function scopeWithMyjobs($query)
    {
        return $query->with('myjobs');
    }
}
