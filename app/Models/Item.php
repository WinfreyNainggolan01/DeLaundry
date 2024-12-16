<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'student_id',
        'name',
        'quantity',
        'note',
    ];

    public function itemOrders(): HasMany
    {
        return $this->hasMany(ItemOrder::class, 'item_id');
    }

<<<<<<< Updated upstream
    // public function items():HasMany
    // {
    //     return $this->hasMany(Item::class);
    // }
=======
>>>>>>> Stashed changes

    public function orderItems(): HasMany
    {
        return $this->hasMany(ItemOrder::class, 'item_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
