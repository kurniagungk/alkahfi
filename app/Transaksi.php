<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'id',
        'id_transaksi',
        'tipe',
        'tanggal',
        'jumlah',
    ];
}
