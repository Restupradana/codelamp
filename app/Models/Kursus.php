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
        'instruktur_id',   // perbaikan: ini adalah foreign key
        'kategori',
        'harga_kursus',
        'status',
        'cover',
        'vidio',
        'jumlah_siswa',
        'deskripsi',
    ];

    public $timestamps = true;

    /**
     * Relasi ke user sebagai instruktur (user dengan role 'instruktur')
     */
    public function instruktur()
    {
        return $this->belongsTo(User::class, 'instruktur_id');
    }

    /**
     * Relasi ke siswa yang mengikuti kursus
     */
    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kursus_siswa')
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
