<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
