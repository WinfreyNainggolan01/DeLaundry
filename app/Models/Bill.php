<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bill extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'student_id',
        'order_id',
        'date_at',
        'month',
        'total_weight',
        'total_amount',
        'status',
    ];

    public function students():HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }
}
