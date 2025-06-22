<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['siswa_id', 'kursus_id', 'status', 'tanggal_transaksi'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
