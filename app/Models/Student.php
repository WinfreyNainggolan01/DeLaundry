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
        'photo_public_id',
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
        // Ambil 3 karakter pertama dari NIM
        $prefix = strtoupper(substr($nim, 0, 3)); // Gunakan strtoupper untuk memastikan huruf besar
    
        if ($prefix === '12S') {
            $emailPrefix = 'iss';
        } elseif ($prefix === '13S') {
            $emailPrefix = 'ifs';
        } elseif ($prefix === '14S') {
            $emailPrefix = 'els';
        } else {
            $emailPrefix = 'unk';
        }
    
        // Ambil 5 karakter berikutnya setelah prefix untuk melengkapi email
        $email = $emailPrefix . substr($nim, 3, 5) . '@students.del.ac.id';
    
        return $email;
    }

    // Tambahkan relasi dormitory
    public function dormitory(): BelongsTo // Ubah ini
    {
        return $this->belongsTo(Dormitory::class);
    }

    public function bill():BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }
}
