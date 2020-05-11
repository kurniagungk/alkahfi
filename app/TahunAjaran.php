<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id_tahun';
    protected $fillable = [
        'nama',
        'semester',
        'awal',
        'akhir',
    ];

    public function tahun()
    {
        return $this->hasMany('App\DaftarTagihan', 'id_tagihan');
    }
}
