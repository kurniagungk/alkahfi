<?php

namespace App\Http\Livewire\Santri;

use Livewire\{Component, WithFileUploads};
use Illuminate\{Validation\Rule, Support\Facades\Storage, Support\Facades\Auth};
use App\{asrama, TahunAjaran, Kelas, santri as dataSantri, Wilayah, Sekolah};

class Edit extends Component
{

    use WithFileUploads;

    public $santri_id;
    public $nism;
    public $nisn;
    public $nama;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $sekolah;
    public $kelas;
    public $asrama;
    public $telepon;
    public $jenis_kelamin;
    public $tahun;
    public $wali;
    public $photo;
    public $NewPhoto;
    public $DataAsrama;
    public $DataSekolah;
    public $DataKelas;
    public $dataProvinsi;
    public $dataKabupaten;
    public $dataKecamatan;
    public $dataDesa;
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $desa;

    public function mount($santri)
    {
        $this->nism = $santri->nism;
        $this->nisn = $santri->nisn;
        $this->nama = $santri->nama;
        $this->tempat_lahir = $santri->tempat_lahir;
        $this->tanggal_lahir = $santri->tanggal_lahir;
        $this->alamat = $santri->alamat;
        $this->sekolah = $santri->sekolah_id;
        $this->kelas = $santri->kelas_id;
        $this->asrama = $santri->asrama_id;
        $this->telepon = $santri->telepon;
        $this->jenis_kelamin = $santri->jenis_kelamin;
        $this->tahun = $santri->tahun;
        $this->wali = $santri->wali;
        $this->photo = $santri->foto;
        $this->santri_id = $santri->id;
        $this->provinsi = $santri->provinsi_id;
        $this->kabupaten = $santri->kabupaten_id;
        $this->kecamatan =  $santri->kecamatan_id;
        $this->desa =  $santri->desa_id;
        $this->data();
    }

    public function data()
    {

        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $sekolah = Sekolah::where('id', $user->sekolah_id)->get();
        } else {
            $sekolah = Sekolah::get();
        }


        $this->DataAsrama = asrama::get();
        $this->DataTahun = TahunAjaran::get();
        $this->DataSekolah = $sekolah;
        $this->DataKelas = Kelas::where('sekolah_id', $this->sekolah)->latest()->get();

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




    public function update()
    {

        $messages = [
            'nism.required'    => 'NISM TIDAK BOLEH KOSONG',
            'nisn.required'    => 'NISN TIDAK BOLEH KOSONG',
            'nism.unique'    => 'NISM TIDAK BOLEH SAMA',
            'nisn.unique'    => 'NISN TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'tanggal_lahir.required'    => 'TANGGAL LAHIR TIDAK BOLEH KOSONG',
            'alamat.required'    => 'ALAMAT TIDAK BOLEH KOSONG',
            'sekolah.required'    => 'SEKOLAH TIDAK BOLEH KOSONG',
            'asrama.required'    => 'ASRAMA TIDAK BOLEH KOSONG',
            'jenis_kelamin.required'    => 'JENIS KELAMIN TIDAK BOLEH KOSONG',
            'wali.required'    => 'NAMA WALI TIDAK BOLEH KOSONG',
            'tempat_lahir.required'    => 'TEMPAT LAHIR TIDAK BOLEH KOSONG',
            'telepon.required'    => 'NO HP TIDAK BOLEH KOSONG',
            'provinsi.required' => 'PROVINSI TIDAK BOLEH KOSONG',
            'kabupaten.required' => 'KABUPATEN TIDAK BOLEH KOSONG',
            'kecamatan.required' => 'KECAMATAN TIDAK BOLEH KOSONG',
            'desa.required' => 'DESA TIDAK BOLEH KOSONG'

        ];

        $validatedData = $this->validate([
            'nism' => ['required', Rule::unique('santri')->ignore($this->nism, 'nism')],
            'nisn' => ['required', Rule::unique('santri')->ignore($this->nisn, 'nisn')],
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'date',
            'alamat' => 'required',
            'sekolah' => 'required|exists:sekolah,id',
            'asrama' => 'required|exists:asrama,id',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'id_tahun' => 'date',
            'nama_wali' => 'required',
            'photo' => 'image|max:2048',
            'photo' => 'image|max:2048',
            'provinsi' => 'required|exists:wilayah,kode',
            'kabupaten' => 'required|exists:wilayah,kode',
            'kecamatan' => 'required|exists:wilayah,kode',
            'desa' => 'required|exists:wilayah,kode'

        ], $messages);

        if ($this->sekolah > 1)
            $validatedData = $this->validate([
                'kelas' => 'required',
            ]);




        $santri = dataSantri::find($this->santri_id);


        if ($this->NewPhoto) {

            $validatedData = $this->validate([
                'NewPhoto' => 'image|max:2048',
            ]);

            Storage::disk('public')->delete($this->photo);

            $photo = $this->NewPhoto->store('photos', 'public');

            $santri->foto = $photo;
        }
        $santri->nism = $this->nism;
        $santri->nisn = $this->nisn;
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
        $santri->kelas_id = $this->kelas ?? '';
        $santri->provinsi_id = $this->provinsi;
        $santri->kabupaten_id = $this->kabupaten;
        $santri->kecamatan_id = $this->kecamatan;
        $santri->desa_id = $this->desa;


        $santri->save();
        session()->flash('success', 'Data Santri successfully edite.');
        return redirect()->route('santri.index');
    }


    public function render()
    {
        return view('livewire.santri.edit');
    }
}
