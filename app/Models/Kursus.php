<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    protected $table = 'kursus';

    protected $fillable = [
        'tgl_pembuatan',
        'judul_kursus',
        'instruktur',
        'kategori',
        'harga_kursus',
        'status',
        'cover',        // field untuk foto cover
        'vidio',        // field untuk video kursus
        'jumlah_siswa', // field jumlah siswa
        'deskripsi',    // field deskripsi kursus
    ];

    public $timestamps = true;

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'kursus_siswa')
            ->withPivot('skor', 'status', 'tanggal_masuk')
            ->withTimestamps();
    }

    public function kursusSiswa()
    {
        return $this->hasMany(KursusSiswa::class);
    }

    public function tujuan()
    {
        return $this->hasMany(TujuanKursus::class);
    }

    public function materi()
    {
        return $this->hasMany(MateriKursus::class);
    }
}
