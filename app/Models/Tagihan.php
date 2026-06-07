<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;

class Tagihan extends Model
{
    //
    protected $casts = [
        'periode_tagihan' => 'date',
        'tanggal_pembayaran' => 'date',
    ];
    protected $fillable = [
        'pelanggan_id',
        'periode_tagihan',
        'nominal_tagihan',
        'status_pembayaran',
        'tanggal_pembayaran'
    ];
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
