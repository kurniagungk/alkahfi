<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'semester',
        'awal',
        'akhir',
    ];
}
