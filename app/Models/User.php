<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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

    public function mosque_profiles()
    {
        return $this->hasOne(MosqueProfile::class);
    }
    public function mosque_caretaker()
    {
        return $this->hasOne(MosqueCaretaker::class);
    }
    public function mosque_admin()
    {
        return $this->hasOne(MosqueAdministratorProfile::class);
    }
    public function mosque_land()
    {
        return $this->hasOne(MosqueLand::class);
    }
    public function mosque_program()
    {
        return $this->hasOne(MosqueProgram::class);
    }
    public function mosque_condition()
    {
        return $this->hasOne(MosqueCondition::class);
    }

    public function monthly_report()
    {
        return $this->hasMany(MonthlyFinancialReport::class);
    }

    public function galleries()
    {
        return $this->hasMany(MosqueGallery::class);
    }
    public function structures()
    {
        return $this->hasMany(MosqueStructure::class);
    }
    public function daily_checklists()
    {
        return $this->hasMany(DailyChecklist::class);
    }
    public function weekly_cehcklists()
    {
        return $this->hasMany(WeeklyChecklist::class);
    }
    public function monthly_checklists()
    {
        return $this->hasMany(MonthlyChecklist::class);
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
