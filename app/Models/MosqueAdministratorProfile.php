<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueAdministratorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'coordinator_name',
        'phone_number',
        'coordinator_status',
        'other_position',
        'director_name'
    ];
        public function user(){
        return $this->belongsTo(User::class);
    }

    
}