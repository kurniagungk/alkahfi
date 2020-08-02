<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'bayar';
    protected $fillable = [
        'id',
        'id_tagihan',
        'jumlah',
        'id_transaksi',
    ];

    protected $keyType = 'string';


    function transaksi()
    {
        return $this->belongsToMany('App\Transaksi', 'id_transaksi');
    }
}
