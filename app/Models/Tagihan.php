<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    protected $fillable = [
        'pelanggan_id',
        'periode_tagihan',
        'nominal_tagihan',
        'status_pembayaran',
        'tanggal_pembayaran'
    ];
    public function pelanggan()
    {
        return this->belongsTo(Pelanggan::class);
    }
}
