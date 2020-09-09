<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use wilayah;

class santri extends Model
{
    //
    protected $table = 'santri';

    protected $fillable = [
        'id',
        'nisn',
        'nism',
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
        'kelas_id',
        'provinsi_id',
        'kabupaten_id',
        'kecamatan_id',
        'desa_id'
    ];


    protected $keyType = 'string';

    public function asrama()
    {
        return $this->hasOne('App\asrama', 'id', 'asrama_id');
    }
    public function sekolah()
    {
        return $this->hasOne(Sekolah::class, 'id', 'sekolah_id');
    }

    public function provinsi()
    {
        return $this->hasOne('App\Wilayah', 'kode', 'provinsi_id');
    }
    public function kabupaten()
    {
        return $this->hasOne('App\Wilayah', 'kode', 'kabupaten_id');
    }
    public function kecamatan()
    {
        return $this->hasOne('App\Wilayah', 'kode', 'kecamatan_id');
    }
    public function desa()
    {
        return $this->hasOne('App\Wilayah', 'kode', 'desa_id');
    }
}
