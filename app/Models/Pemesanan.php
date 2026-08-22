<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = ['pelanggan_id', 'layanan_id', 'tanggal_pesan', 'status'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}