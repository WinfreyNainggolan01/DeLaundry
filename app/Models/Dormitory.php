<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dormitory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'gender'
    ];

    public function dormitories(): HasMany
    {
        return $this->hasMany(Dormitory::class);
    }
}
