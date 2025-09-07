<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'courses_id',
        'name',
        'category',
        'content',
        'file',
        'description',
        'required',
        'deadline'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function requiredTask(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'required');
    }

    public function taskcomplate()
    {
        return $this->hasMany(TaskComplete::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
    
}
