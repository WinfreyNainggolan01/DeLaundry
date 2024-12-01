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
        'status',
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    public static function generateUniqueOrdxId(): string
    {
        $prefix = 'DLR';
        do{
            $randomString = $prefix . mt_rand(1000000,9999999);
        } while (self::where('ordx_id', $randomString)->exists());

        return $randomString;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function itemOrders(): HasMany
    {
        return $this->hasMany(ItemOrder::class, 'order_id');
    }

    public function orderFinances(): HasMany
    {
        return $this->hasMany(OrderFinance::class, 'order_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function dormitory(): BelongsTo
    {
        return $this->belongsTo(Dormitory::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class, 'order_id');
    }

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'order_id');
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class, 'order_id'); // Jika model Feedback sudah ada
    }

}


