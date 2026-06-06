<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $fillable = [
        'nama_pelanggan',
        'nomor_telepon',
        'alamat',
        'paket_internet',
        'harga_paket',
        'status'
    ];
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
