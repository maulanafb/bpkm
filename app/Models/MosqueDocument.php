<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id',
        'land_title_deed',
        'mosque_photo',
        'mosque_design',
        
    ];

    public function mosque(){
        return $this->belongsTo(Mosque::class);
    }
}