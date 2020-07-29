<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'bayar';
    protected $fillable = [
        'id_bayar',
        'id_tagihan',
        'jumlah',
        'id_transaksi',
    ];
    protected $primaryKey = 'id_bayar';

    function transaksi()
    {
        return $this->belongsToMany('App\Transaksi', 'id_transaksi');
    }
}
