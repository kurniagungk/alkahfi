<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarTagihan extends Model
{
    //
    protected $table = 'daftar_tgh';
    protected $primaryKey = 'id_tagihan';
    protected $fillable = [
        'id_tagihan',
        'nama',
        'id_jenis',
        'id_tahun'
    ];

    public function jenis()
    {
        return $this->hasMany('App\Tagihan', 'id_tagihan');
    }
}
