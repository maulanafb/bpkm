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
        'development_process',
        'current_state_development',
        'total_land_area'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}