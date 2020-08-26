<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asrama extends Model
{
    protected $table = 'asrama';
    protected $fillable = [
        'kode',
        'nama',
        'kapasitas',
        'tipe',
        'keterangan',
    ];

    function penghuni()
    {
        return $this->hasMany('App\Santri');
    }
}
