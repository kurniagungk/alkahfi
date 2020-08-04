<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarTagihan extends Model
{
    //
    protected $table = 'daftar_tgh';
    protected $fillable = [
        'id',
        'nama',
        'id_jenis',
        'id_tahun'
    ];

    public function tagihan()
    {
        return $this->hasMany('App\Tagihan', 'id_tagihan');
    }

    public function tahun()
    {
        return $this->belongsTo('App\TahunAjaran', 'id_tahun');
    }
}
