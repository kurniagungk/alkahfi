<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class santri extends Model
{
    //
    protected $table = 'santri';
    protected $primaryKey = 'id_santri';
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
        'foto',
        'tempat_lahir',
        'telepon'
    ];

    public function asrama()
    {
        return $this->belongsTo('App\asrama', 'asrama_id');
    }
}
