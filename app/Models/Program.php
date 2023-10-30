<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}