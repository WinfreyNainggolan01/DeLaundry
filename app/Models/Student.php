<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable
{
    use Notifiable, SoftDeletes;

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
}
