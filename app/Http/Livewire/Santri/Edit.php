<?php

namespace App\Http\Livewire\Santri;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\asrama, App\TahunAjaran;
use App\santri;

class Edit extends Component
{

    use WithFileUploads;

    public $no_induk;
    public $nama;
    public $tempat_lahir;
    public $tgl_lahir;
    public $alamat;
    public $sekolah;
    public $asrama;
    public $telepon;
    public $jenis_kelamin;
    public $id_tahun;
    public $nama_wali;
    public $photo;
    public $DataAsrama;
    public $DataTahun;
    public $IdSantri;
    public $NewPhoto;

    public function mount($santri)
    {
        $this->no_induk = $santri->no_induk;
        $this->nama = $santri->nama;
        $this->tempat_lahir = $santri->tempat_lahir;
        $this->tgl_lahir = $santri->tgl_lahir;
        $this->alamat = $santri->alamat;
        $this->sekolah = $santri->sekolah;
        $this->asrama = $santri->asrama_id;
        $this->telepon = $santri->telepon;
        $this->jenis_kelamin = $santri->jenis_kelamin;
        $this->id_tahun = $santri->id_tahun;
        $this->nama_wali = $santri->nama_wali;
        $this->photo = $santri->foto;
        $this->IdSantri = $santri->id_santri;
        $this->DataAsrama = asrama::get();
        $this->DataTahun = TahunAjaran::get();
    }


    public function updated($field)
    {
        $messages = [
            'no_induk.required'    => 'NIS TIDAK BOLEH KOSONG',
            'no_induk.unique'    => 'NIS TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'tgl_lahir.required'    => 'TANGGAL LAHIR TIDAK BOLEH KOSONG',
            'alamat.required'    => 'ALAMAT TIDAK BOLEH KOSONG',
            'sekolah.required'    => 'SEKOLAH TIDAK BOLEH KOSONG',
            'asrama.required'    => 'ASRAMA TIDAK BOLEH KOSONG',
            'jenis_kelamin.required'    => 'JENIS KELAMIN TIDAK BOLEH KOSONG',
            'id_tahun.required'    => 'TAHUN MASUK TIDAK BOLEH KOSONG',
            'nama_wali.required'    => 'NAMA WALI TIDAK BOLEH KOSONG',
            'tempat_lahir.required'    => 'TEMPAT LAHIR TIDAK BOLEH KOSONG',
            'telepon.required'    => 'NO HP TIDAK BOLEH KOSONG',

        ];

        $this->validateOnly($field, [
            'no_induk' => ['required', Rule::unique('santri')->ignore($this->IdSantri, 'id_santri')],
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'date',
            'alamat' => 'required',
            'sekolah' => 'required',
            'asrama' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'id_tahun' => 'required',
            'nama_wali' => 'required',
            'NewPhoto' => 'image|max:2048',
        ], $messages);
    }


    public function update()
    {

        $messages = [
            'no_induk.required'    => 'NIS TIDAK BOLEH KOSONG',
            'no_induk.unique'    => 'NIS TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'tgl_lahir.required'    => 'TANGGAL LAHIR TIDAK BOLEH KOSONG',
            'alamat.required'    => 'ALAMAT TIDAK BOLEH KOSONG',
            'sekolah.required'    => 'SEKOLAH TIDAK BOLEH KOSONG',
            'asrama.required'    => 'ASRAMA TIDAK BOLEH KOSONG',
            'jenis_kelamin.required'    => 'JENIS KELAMIN TIDAK BOLEH KOSONG',
            'id_tahun.required'    => 'TAHUN MASUK TIDAK BOLEH KOSONG',
            'nama_wali.required'    => 'NAMA WALI TIDAK BOLEH KOSONG',
            'tempat_lahir.required'    => 'TEMPAT LAHIR TIDAK BOLEH KOSONG',
            'telepon.required'    => 'NO HP TIDAK BOLEH KOSONG',

        ];

        $validatedData = $this->validate([
            'no_induk' => ['required', Rule::unique('santri')->ignore($this->IdSantri, 'id_santri')],
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'date',
            'alamat' => 'required',
            'sekolah' => 'required',
            'asrama' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'id_tahun' => 'required',
            'nama_wali' => 'required',

        ], $messages);







        $santri = santri::find($this->IdSantri);

        if ($this->NewPhoto) {

            $validatedData = $this->validate([
                'NewPhoto' => 'image|max:2048',
            ]);

            Storage::disk('public')->delete($this->photo);

            $photo = $this->NewPhoto->store('photos', 'public');

            $santri->foto = $photo;
        }
        $santri->no_induk = $this->no_induk;
        $santri->nama = $this->nama;
        $santri->tempat_lahir = $this->tempat_lahir;
        $santri->tgl_lahir = $this->tgl_lahir;
        $santri->alamat = $this->alamat;
        $santri->sekolah = $this->sekolah;
        $santri->asrama_id = $this->asrama;
        $santri->telepon = $this->telepon;
        $santri->jenis_kelamin = $this->jenis_kelamin;
        $santri->id_tahun = $this->id_tahun;
        $santri->nama_wali = $this->nama_wali;

        $santri->save();

        return redirect()->route('santri.index');
    }


    public function render()
    {
        return view('livewire.santri.edit');
    }
}
