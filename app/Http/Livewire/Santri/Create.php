<?php

namespace App\Http\Livewire\Santri;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\asrama, App\Sekolah;
use App\TahunAjaran;
use App\santri;
use App\Wilayah;


class Create extends Component
{
    use WithFileUploads;

    public $nis;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $sekolah;
    public $asrama;
    public $telepon;
    public $jenis_kelamin;
    public $id_tahun;
    public $nama_wali;
    public $photo;
    public $DataAsrama;
    public $DataSekolah;
    public $dataProvinsi;
    public $dataKabupaten;
    public $dataKecamatan;
    public $dataDesa;
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $desa;

    public function mount()
    {
        $this->DataAsrama = asrama::get();
        $this->DataSekolah = Sekolah::get();
        $this->dataProvinsi = Wilayah::whereRaw('CHAR_LENGTH(kode) = 2')
            ->get();
    }

    public function updatingprovinsi($value)
    {
        $this->reset('kabupaten', 'kecamatan', 'desa');
        $this->dataKabupaten = Wilayah::whereRaw('LEFT(kode, 2) = "' . $value . '"')
            ->whereRaw('CHAR_LENGTH(kode) = 5')
            ->get();
    }

    public function updatingkabupaten($value)
    {
        $this->reset('kecamatan', 'desa');
        $this->dataKecamatan = Wilayah::whereRaw('LEFT(kode, 5) = "' . $value . '"')
            ->whereRaw('CHAR_LENGTH(kode) = 8')
            ->get();
    }

    public function updatingkecamatan($value)
    {
        $this->reset('desa');
        $this->dataDesa = Wilayah::whereRaw('LEFT(kode, 8) = "' . $value . '"')
            ->whereRaw('CHAR_LENGTH(kode) = 13')
            ->get();
    }



    public function updated($field)
    {
        $this->validateOnly($field, [
            'nis' => 'unique:santri|max:255',
            'tgl_lahir' => 'date'
        ]);
    }



    public function store()
    {

        $messages = [
            'nis.required'    => 'NIS TIDAK BOLEH KOSONG',
            'nis.unique'    => 'NIS TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'tanggal_lahir.required'    => 'TANGGAL LAHIR TIDAK BOLEH KOSONG',
            'alamat.required'    => 'ALAMAT TIDAK BOLEH KOSONG',
            'sekolah.required'    => 'SEKOLAH TIDAK BOLEH KOSONG',
            'asrama.required'    => 'ASRAMA TIDAK BOLEH KOSONG',
            'jenis_kelamin.required'    => 'JENIS KELAMIN TIDAK BOLEH KOSONG',
            'id_tahun.required'    => 'TAHUN MASUK TIDAK BOLEH KOSONG',
            'nama_wali.required'    => 'NAMA WALI TIDAK BOLEH KOSONG',
            'tempat_lahir.required'    => 'TEMPAT LAHIR TIDAK BOLEH KOSONG',
            'telepon.required'    => 'NO HP TIDAK BOLEH KOSONG',
            'provinsi.required' => 'PROVINSI TIDAK BOLEH KOSONG',
            'kabupaten.required' => 'KABUPATEN TIDAK BOLEH KOSONG',
            'kecamatan.required' => 'KECAMATAN TIDAK BOLEH KOSONG',
            'desa.required' => 'DESA TIDAK BOLEH KOSONG'

        ];

        $validatedData = $this->validate([
            'nis' => 'required|unique:santri|max:255',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'date',
            'alamat' => 'required',
            'sekolah' => 'required',
            'asrama' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'id_tahun' => 'required',
            'nama_wali' => 'required',
            'photo' => 'image|max:2048',
            'photo' => 'image|max:2048',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required'

        ], $messages);

        $photo = $this->photo->store('photos', 'public');


        $data = array(
            'id' => Str::uuid(),
            'nis' => $this->nis,
            'nama' => $this->nama,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat,
            'telepon' => $this->telepon,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tahun' => $this->id_tahun,
            'wali' => $this->nama_wali,
            'foto' => $photo,
            'sekolah_id' => $this->sekolah,
            'asrama_id' => $this->asrama,
            'provinsi_id' => $this->provinsi,
            'kabupaten_id' => $this->kabupaten,
            'kecamatan_id' => $this->kecamatan,
            'desa_id' => $this->desa,
        );


        santri::create($data);

        session()->flash('success', 'Data Santri successfully add.');

        return redirect()->route('santri.index');
    }




    public function render()
    {

        return view('livewire.santri.create');
    }
}
