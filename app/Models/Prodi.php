<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['name', 'logo', 'description', 'slug'];

    protected $table = 'prodis';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($prodi) {
            $prodi->slug = Str::slug($prodi->name);
        });
    }

    // Satu prodi punya banyak user
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
