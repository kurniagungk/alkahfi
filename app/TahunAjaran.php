<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $fillable = [
        'nama',
        'awal',
        'akhir',
    ];

    public function tahun()
    {
        return $this->hasMany('App\DaftarTagihan', 'id_tagihan');
    }
}
