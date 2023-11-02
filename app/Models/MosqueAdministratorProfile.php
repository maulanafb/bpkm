<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueAdministratorProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'photo_path',
        'manager_name',
        'phone_number',
        'manager_status',
        'other_position',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
