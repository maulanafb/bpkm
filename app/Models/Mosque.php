<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mosque extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','address','regency_id','province_id','coordinator','mosque_account_number','bmi_account_number','history'];

    public function user(){
        return $this->belongsTo(User::class,);
    }

    public function mosque_profile() {
        return $this->hasOne(MosqueProfile::class);
    }

    public function regency(){
        return $this->belongsTo(Regency::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
}