<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'address',
        'regency_id',
        'province_id',
        'coordinator',
        'password',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function mosque_profile() {
        return $this->hasOne(MosqueProfile::class);
    }
    public function mosque_admin(){
        return $this->hasOne(MosqueAdministratorProfile::class);
    }
    public function mosque_land(){
        return $this->hasOne(MosqueLand::class);
    }
    public function mosque_document(){
        return $this->hasOne(MosqueDocument::class);
    }
    public function mosque_condition(){
        return $this->hasOne(MosqueCondition::class);
    }

    public function regency(){
        return $this->belongsTo(Regency::class);
    }

    public function province(){
        return $this->belongsTo(Province::class);
    }
}