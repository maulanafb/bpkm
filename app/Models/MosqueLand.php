<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueLand extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'land_status',
        'land_name',
        'total_land_area',
        'building_area',
        'land_document',
        'mosque_design',
        'mosque_rab',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
