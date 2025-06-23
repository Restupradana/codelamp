<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KursusSiswa extends Model
{
    use HasFactory;

    protected $table = 'kursus_siswa';

    protected $fillable = [
        'siswa_id',
        'kursus_id',
        'skor',
        'status',
    ];

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    // Relasi ke model Kursus
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
}
