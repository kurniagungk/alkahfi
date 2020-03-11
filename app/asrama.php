<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asrama extends Model
{
    protected $table = 'asrama';
    protected $primaryKey = 'kode';
    protected $fillable = [
        'kode',
        'nama',
        'jumlah',
        'kelamin',
        'keterangan',
    ];
}
