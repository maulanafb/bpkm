<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyChecklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'monthly_khatam_quran',
        'date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Define relationships or additional methods if needed
}
