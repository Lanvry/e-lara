<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
     protected $fillable = ['name'];

     protected $table = 'prodis';

    // Satu prodi punya banyak user
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
