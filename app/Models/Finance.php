<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Finance extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'total_price',
        'month',
        'status',
    ];

    public function orderfinances():HasMany
    {
        return $this->hasMany(OrderFinance::class);
    }
}
