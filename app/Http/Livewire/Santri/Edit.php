<?php

namespace App\Http\Livewire\Santri;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\asrama, App\TahunAjaran;
use App\santri, App\Wilayah;
use App\Sekolah;

class Edit extends Component
{

    use WithFileUploads;

    public $santri_id;
    public $nis;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $sekolah;
    public $asrama;
    public $telepon;
    public $jenis_kelamin;
    public $tahun;
    public $wali;
    public $photo;
    public $NewPhoto;
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

    public function mount(santri $santri)
    {
        $this->nis = $santri->nis;
        $this->nama = $santri->nama;
        $this->tempat_lahir = $santri->tempat_lahir;
        $this->tanggal_lahir = $santri->tanggal_lahir;
        $this->alamat = $santri->alamat;
        $this->sekolah = $santri->sekolah_id;
        $this->asrama = $santri->asrama_id;
        $this->telepon = $santri->telepon;
        $this->jenis_kelamin = $santri->jenis_kelamin;
        $this->tahun = $santri->tahun;
        $this->wali = $santri->wali;
        $this->photo = $santri->foto;
        $this->santri_id = $santri->id;
        $this->provinsi = substr($santri->wilayah_id, 0, 2);
        $this->kabupaten = substr($santri->wilayah_id, 0, 5);
        $this->kecamatan = substr($santri->wilayah_id, 0, 8);
        $this->desa = substr($santri->wilayah_id, 0, 13);
        $this->data();
    }

    public function data()
    {
        $this->DataAsrama = asrama::get();
        $this->DataTahun = TahunAjaran::get();
        $this->DataSekolah = Sekolah::get();
        $this->dataProvinsi = Wilayah::whereRaw('CHAR_LENGTH(kode) = 2')
            ->get();
        $this->dataKabupaten = Wilayah::whereRaw('LEFT(kode, 2) = "' . $this->provinsi . '"')
            ->whereRaw('CHAR_LENGTH(kode) = 5')
            ->get();
        $this->dataKecamatan = Wilayah::whereRaw('LEFT(kode, 5) = "' . $this->kabupaten . '"')
            ->whereRaw('CHAR_LENGTH(kode) = 8')
            ->get();
        $this->dataDesa = Wilayah::whereRaw('LEFT(kode, 8) = "' . $this->kecamatan . '"')
            ->whereRaw('CHAR_LENGTH(kode) = 13')
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


    public function update()
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
            'tahun.required'    => 'TAHUN MASUK TIDAK BOLEH KOSONG',
            'wali.required'    => 'NAMA WALI TIDAK BOLEH KOSONG',
            'tempat_lahir.required'    => 'TEMPAT LAHIR TIDAK BOLEH KOSONG',
            'telepon.required'    => 'NO HP TIDAK BOLEH KOSONG',
            'provinsi.required' => 'PROVINSI TIDAK BOLEH KOSONG',
            'kabupaten.required' => 'KABUPATEN TIDAK BOLEH KOSONG',
            'kecamatan.required' => 'KECAMATAN TIDAK BOLEH KOSONG',
            'desa.required' => 'DESA TIDAK BOLEH KOSONG'

        ];

        $validatedData = $this->validate([
            'nis' => ['required', Rule::unique('santri')->ignore($this->nis, 'nis')],
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'date',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'tahun' => 'required',
            'wali' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'sekolah' => 'required',
            'asrama' => 'required',

        ], $messages);






        $santri = santri::find($this->santri_id);


        if ($this->NewPhoto) {

            $validatedData = $this->validate([
                'NewPhoto' => 'image|max:2048',
            ]);

            Storage::disk('public')->delete($this->photo);

            $photo = $this->NewPhoto->store('photos', 'public');

            $santri->foto = $photo;
        }
        $santri->nis = $this->nis;
        $santri->nama = $this->nama;
        $santri->tempat_lahir = $this->tempat_lahir;
        $santri->tanggal_lahir = $this->tanggal_lahir;
        $santri->alamat = $this->alamat;
        $santri->telepon = $this->telepon;
        $santri->jenis_kelamin = $this->jenis_kelamin;
        $santri->tahun = $this->tahun;
        $santri->wali = $this->wali;
        $santri->asrama_id = $this->asrama;
        $santri->sekolah_id = $this->sekolah;


        $santri->save();
        session()->flash('success', 'Data Santri successfully edite.');
        return redirect()->route('santri.index');
    }


    public function render()
    {
        return view('livewire.santri.edit');
    }
}
