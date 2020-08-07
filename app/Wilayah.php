<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    protected $primaryKey = 'kode';
    protected $table = 'wilayah';
    protected $keyType = 'string';
}
