<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyChecklist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'stw', 'al_mulk', 'smk', 'odoj', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
