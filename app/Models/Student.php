<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use Notifiable, SoftDeletes, HasFactory, HasApiTokens;

    protected $guard = 'student';  // pastikan ini sesuai

    protected $fillable = [
        'name',
        'nim',
        'username',
        'password',
        'dormitory_id',
        'gender',
        'program_study',
        'phone_number',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    // Tambahkan relasi dormitory
    public function dormitory(): BelongsTo // Ubah ini
    {
        return $this->belongsTo(Dormitory::class);
    }
}
