<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Mentor extends Authenticatable
{
    protected $fillable = ['nama', 'email', 'password'];

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }
}
