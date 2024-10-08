<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderFinance extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'finance_id',
        'order_id',
    ];

    public function finance(): BelongsTo
    {
        return $this->belongsTo(Finance::class, 'finance_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
