<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id',
        'problem',
        'funding_plan',
        'funding_needs',
        'building_area'
    ];

        public function mosque(){
        return $this->belongsTo(Mosque::class);
    }
}