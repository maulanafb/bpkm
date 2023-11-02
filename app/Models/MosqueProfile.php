<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'manager',
        'photo_path',
        'deputy_regional_supervisor',
        'deputy_branch_supervisor',
        'tiktok',
        'instagram',
        'facebook',
        'youtube',
        'tweeter',
        'history',
        'building_area',
        'address',
        'province_id',
        'regency_id',
        'phone_number'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
}
