<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    //
    protected $table = 'tagihan';
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function jenis()
    {
        return $this->belongsTo(Jenis_tagihan::class, 'jenis_tagihan_id');
    }
    public function bayar()
    {
        return $this->hasMany('App\Bayar', 'tagihan_id',);
    }

    public function bayarbulanan()
    {
        return $this->hasOne('App\Bayar', 'id');
    }
}
