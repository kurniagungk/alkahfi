<?php

namespace App\Imports;

use App\santri;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class SantriImport implements WithHeadingRow, ToCollection
{
    /**
     * @param Collection $collection
     */

    public function headingRow(): int
    {
        return 1;
    }


    public function collection(Collection $collection)
    {

        Validator::make($collection->toArray(), [
            '*.nisn' => 'required|unique:santri|max:255',
            //  '*.nism' => 'required|unique:santri|max:255',
            // '*.nama' => 'required',
            //'*.tempat_lahir' => 'required',
            // '*.jenis_kelamin' => 'required',
            //'*.alamat' => 'required',
            //'*.wali' => 'required',
            //   '*.telepon' => 'required',
            //'*.sekolah_id' => 'required',
            //'*.asrama_id' => 'required',
            // '*.provinsi_id' => 'required',
            // '*.kabupaten_id' => 'required',
            // '*.kecamatan_id' => 'required',
            // '*.desa_id' => 'required'
        ])->validate();


        foreach ($collection as $row) {

            santri::create([
                'id' => Str::uuid(),
                'nisn' => $row['nisn'],
                'nism' => $row['nism'],
                'nama' => $row['nama'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal_lahir']),
                'jenis_kelamin' => $row['jenis_kelamin'] == 'p' ? 'Perempuan' : 'Laki-Laki',
                'alamat' => $row['alamat'],
                'wali' => $row['wali'],
                'telepon' => $row['telepon'],
                'sekolah_id' => $row['sekolah_id'],
                'kelas_id' => $row['kelas_id'],
                'asrama_id' => $row['asrama_id'],
                'tahun' =>  $row['tahun'],
                'provinsi_id' => $row['provinsi_id'],
                'kabupaten_id' => $row['kabupaten_id'],
                'kecamatan_id' => $row['kecamatan_id'],
                'desa_id' => $row['desa_id']
            ]);
        }
    }
}
