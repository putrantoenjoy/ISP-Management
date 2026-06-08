<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'nama_pelanggan',
        'nomor_telepon',
        'alamat',
        'paket_internet',
        'harga_paket',
        'status_pelanggan'
    ];
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
