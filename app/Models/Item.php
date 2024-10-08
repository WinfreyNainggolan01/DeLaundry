<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'quantity',
        'note',

    ];

    public function itemOrders(): HasMany
    {
        return $this->hasMany(ItemOrder::class, 'item_id');
    }

    public function items():HasMany
    {
        return $this->hasMany(Item::class);
    }
}
