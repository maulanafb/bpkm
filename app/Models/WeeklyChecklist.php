<?php

// app/Models/WeeklyChecklist.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyChecklist extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'praza', 'jumah_prayer', 'bp_sk', 'happy_family', 'happy_neighbour', 'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
