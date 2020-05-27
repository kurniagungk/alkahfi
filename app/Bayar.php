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
}
