<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asrama extends Model
{
    protected $table = 'asrama';
    protected $fillable = [
        'kode',
        'nama',
        'jumlah',
        'kelamin',
        'keterangan',
    ];
}
