<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    //
    protected $table = 'santri';

    protected $fillable = [
        'no_induk',
        'nama',
        'tgl_lahir',
        'alamat',
        'sekolah',
        'asrama',
        'jenis_kelamin',
        'id_tahun',
        'nama_wali',
        'asrama_id',
        'foto',
        'tempat_lahir',
        'telepon'
    ];

    public function asrama()
    {
        return $this->hasOne('App\asrama', 'id', 'asrama_id');
    }
}
