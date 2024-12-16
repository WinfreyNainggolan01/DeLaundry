<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ordx_id',
        'date_at',
        'student_id',
        'dormitory_id',
        'weight',
        'price',
        'status',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
        'date_at' => 'datetime',
    ];

    

    public static function generateUniqueOrdxId(): string
    {
        $prefix = 'DLR';
        do{
            $randomString = $prefix . mt_rand(1000000,9999999);
        } while (self::where('ordx_id', $randomString)->exists());

        return $randomString;
    }

    public static function statusToValue($status): string
    {
        $statusValue = [
            'pending' => 'Pending',
            'picked_up' => 'Picked Up',
            'on_process' => 'On Process',
            'delivered' => 'Delivered',
            'done' => 'Done',
        ];
    
        return $statusValue[$status];
    }

    public function itemOrders(): HasMany
    {
        return $this->hasMany(ItemOrder::class, 'order_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function dormitory(): BelongsTo
    {
        return $this->belongsTo(Dormitory::class);
    }


    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'order_id');
    }

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

}


