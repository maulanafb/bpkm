<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MosqueCaretaker extends Model
{
    use HasFactory;
    protected $table = 'mosque_caretaker';
    protected $fillable = [
        'name',
        // Tambahkan kolom "nama" ke dalam properti $fillable
        'role',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
