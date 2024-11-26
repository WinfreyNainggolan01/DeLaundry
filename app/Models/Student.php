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

    public static function generateEmail(string $nim): string
    {
        if (substr($nim, 0, 2) == '12S' || substr($nim, 0, 2) == '12s') {
            $email = 'iss';
        } elseif (substr($nim, 0, 2) == '13S') {
            $email = 'ifs';
        } elseif (substr($nim, 0, 2) == '14S') {
            $email = 'els';
        } else {
            $email = 'unk';
        }
        $email .= substr($nim, 2, 5) . '@students.del.ac.id';
        return $email;
    }

    // Tambahkan relasi dormitory
    public function dormitory(): BelongsTo // Ubah ini
    {
        return $this->belongsTo(Dormitory::class);
    }
}
