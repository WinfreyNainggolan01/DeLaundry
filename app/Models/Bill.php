<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bill extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        // variabel student_id, order_id, date_at, month, total_weight, total_amount
        'student_id',
        'order_id',
        'date_at',
        'month',
        'total_weight',
        'total_amount',
    ];

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
