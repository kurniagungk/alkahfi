<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_tagihan extends Model
{
    protected $table = 'jenis_tagihan';
    protected $fillable = [
        'id',
        'map',
        'nama',
        'tipe',
        'tahun_id',
        'sekolah_id'
    ];

    public function tagihan()
    {
        return $this->hasMany('App\Tagihan', 'jenis_tagihan_id');
    }

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class, 'jenis_tagihan_id');
    }

    public function tahun()
    {
        return $this->belongsTo('App\TahunAjaran', 'tahun_id');
    }
}
