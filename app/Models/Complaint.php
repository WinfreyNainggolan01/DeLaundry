<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        // 'ordx_id',
        'student_id',
        'order_id',
        'title',
        'date_at',
        'status',
        'description',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ComplaintPhoto::class, 'complaint_id');
    }
}
