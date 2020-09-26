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
        'tahun_id'
    ];

    public function tagihan()
    {
        return $this->hasMany('App\Tagihan', 'tagihan_id');
    }

    public function tahun()
    {
        return $this->belongsTo('App\TahunAjaran', 'tahun_id');
    }
}
