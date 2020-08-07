<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    //
    protected $table = 'santri';

    protected $fillable = [
        'id',
        'nis',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'alamat',
        'asrama',
        'jenis_kelamin',
        'tahun',
        'wali',
        'foto',
        'telepon',
        'status',
        'wilayah_id',
        'asrama_id',
        'sekolah_id',
    ];

    protected $keyType = 'string';

    public function asrama()
    {
        return $this->hasOne('App\asrama', 'id', 'asrama_id');
    }
}
