<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    protected $table = 'tagihan';
    protected $primaryKey = 'id';

    public function jenis()
    {
        return $this->belongsTo('App\DaftarTagihan', 'id_tagihan');
    }
    public function bayar()
    {
        return $this->hasOne('App\Bayar', 'id_tagihan');
    }
}
