<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = ['title', 'slug', 'thumbnail', 'description', 'prodi_id', 'required', 'instructor_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->title);

                // Pastikan slug unik:
                $originalSlug = $course->slug;
                $count = 1;
                while (self::where('slug', $course->slug)->exists()) {
                    $course->slug = $originalSlug . '-' . $count++;
                }
            }
        });
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'courses_id');
    }


    public function requiredCourse(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'required');
    }

    /**
     * Prodi lain yang membutuhkan prodi ini
     */
    public function dependents(): HasMany
    {
        return $this->hasMany(Course::class, 'required');
    }
}
