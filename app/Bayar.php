<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    protected $table = 'bayar';
    protected $fillable = [
        'id_bayar',
        'id_tagihan',
        'id_transaksi',
    ];
    protected $primaryKey = 'id_bayar';

    public function transaksi()
    {
        return $this->hasOne('App\Transaksi', 'id_transaksi', 'id_transaksi');
    }
}
