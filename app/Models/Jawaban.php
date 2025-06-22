<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = ['pertanyaan_id', 'mentor_id', 'isi_jawaban'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
