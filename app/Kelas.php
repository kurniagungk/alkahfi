<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'sekolah_id',
        'tingkat',
        'kelas',
        'keterangan',
    ];

    public function sekolah()
    {
        return $this->hasOne(Sekolah::class, 'id', 'sekolah_id');
    }
}
