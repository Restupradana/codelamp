<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Siswa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'siswa'; // nama tabel
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_lengkap',
        'nomor_hp',
        'email',
        'password',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Gunakan "Kata_Sandi" sebagai password untuk login
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function kursus()
    {
        return $this->belongsToMany(Kursus::class, 'kursus_siswa')
            ->withPivot('skor', 'status', 'tanggal_masuk')
            ->withTimestamps();
    }
}
