<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 

class Student extends Authenticatable
{
    use Notifiable, SoftDeletes, HasFactory;

    protected $guard = 'student';  // pastikan ini sesuai

    protected $fillable = [
        'name',
        'nim',
        'username',
        'password',
        'dormitory_id',
        'gender',
        'phone_number',
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
