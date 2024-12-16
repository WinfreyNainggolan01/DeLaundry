<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'complaint_id',
        'student_id',
        'feedback_response',
        'status',
        'date_at',
    ];

    public function order(): BelongsTo
    {
<<<<<<< Updated upstream
        return $this->belongsTo(Complaint::class, 'complaint_id');
=======
        return $this->belongsTo(Order::class, 'order_id');
>>>>>>> Stashed changes
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

<<<<<<< Updated upstream
    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class, 'feedback_id');
=======
    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Feedback::class, 'complaint_id');
>>>>>>> Stashed changes
    }

}
