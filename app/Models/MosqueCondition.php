<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'development_status',
        'director_house_status',
        'odoj_status',
        'quran_house_status',
        'business_entity_status',
        'bmi_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}