<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Company extends Model
{
     use HasFactory;

    protected $fillable = [
        'company_name',
        'business_field',
        'email',
        'phone',
        'description',
        'terms_accepted'
    ];

    protected $casts = [
        'terms_accepted' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
