<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'bayar';
    protected $fillable = [
        'id',
        'tagihan_id',
        'jumlah',
        'id_transaksi',
    ];

    protected $keyType = 'string';


    function transaksi()
    {
        return $this->belongsToMany('App\Transaksi', 'id_transaksi');
    }

    function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id',);
    }

    function daftarTagihan()
    {
        return $this->hasOneThrough(DaftarTagihan::class, Tagihan::class,   'id',   'id', 'tagihan_id', 'daftar_tgh_id',);
    }

    function santri()
    {
        return $this->hasOneThrough(santri::class, Tagihan::class,   'id',   'id', 'tagihan_id', 'santri_id',);
    }
}
