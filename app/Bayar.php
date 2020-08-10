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
        'transaksi_id',
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

    function jenis_tagihan()
    {
        return $this->hasOneThrough(Jenis_tagihan::class, Tagihan::class,   'id',   'id', 'tagihan_id', 'jenis_tagihan_id');
    }

    function santri()
    {
        return $this->hasOneThrough(santri::class, Tagihan::class, 'id', 'id', 'tagihan_id', 'santri_id',);
    }
}
