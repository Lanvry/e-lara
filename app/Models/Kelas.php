<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kelas extends Model
{
    protected $fillable = [
        'user_id',
        'courses_id',
        'task_complete'
    ];

    /**
     * Relasi ke model User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Course
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
}
