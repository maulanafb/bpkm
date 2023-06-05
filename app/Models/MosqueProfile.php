<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo_path',
        'problem',
        'bmi_account_number',
        'mosque_account_number',
        'funding_plan',
        'funding_needs',
        'history',
        'building_area',
        'address',
        'province_id',
        'regency_id',
        'coordinator',
        'phone_number'

    ];

        public function user(){
        return $this->belongsTo(User::class);
    }
}
