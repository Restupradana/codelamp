<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $fillable = ['siswa_id', 'isi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function jawaban()
    {
        return $this->hasOne(Jawaban::class);
    }
}
