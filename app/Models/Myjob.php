<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Myjob extends Model
{
    //use HasFactory;
    protected $fillable = ['name', 'specialization_id'];

    /**
     * Get the specialization that owns the myjob
     */
    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

}
