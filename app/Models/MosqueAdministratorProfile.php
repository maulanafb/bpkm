<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueAdministratorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'mosque_id',
        'coordinator_name',
        'phone_number',
        'coordinator_status',
        'other_position',
        'director_name'
    ];
        public function mosque(){
        return $this->belongsTo(Mosque::class);
    }

    
}