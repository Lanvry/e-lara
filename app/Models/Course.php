<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'prodi_id',
        'instructor_id',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
