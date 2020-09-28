<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = [
        'id',
        'jenis_tagihan_id',
        'transaksi_id',
        'jumlah',
        'keterangan',
    ];

    protected $keyType = 'string';

    function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'id_transaksi');
    }
}
