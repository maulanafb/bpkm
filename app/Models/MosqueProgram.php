<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MosqueProgram extends Model
{
    protected $fillable = [
        'user_id',
        'five_daily_prayer',
        'jumah_prayer',
        'smk',
        'odoj',
        'praza',
        'khatam_quran',
        'bp_sk',
        'almulk_am',
        'happy_neightbor',
        'happy_family'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
