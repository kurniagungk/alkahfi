<?php

namespace App\Http\Livewire\Santri;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use App\asrama;
use App\TahunAjaran;
use App\santri;


class Create extends Component
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

    public function mount()
    {
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
            'no_induk' => 'required|unique:santri|max:255',
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
            'photo' => 'image|max:2048',
        ], $messages);
    }



    public function store()
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
            'no_induk' => 'required|unique:santri|max:255',
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
            'photo' => 'image|max:2048',
        ], $messages);

        $photo = $this->photo->store('photos', 'public');

        $data = array(
            'no_induk' => $this->no_induk,
            'nama' => $this->nama,
            'tempat_lahir' => $this->tempat_lahir,
            'tgl_lahir' => $this->tgl_lahir,
            'alamat' => $this->alamat,
            'sekolah' => $this->sekolah,
            'asrama_id' => $this->asrama,
            'telepon' => $this->telepon,
            'jenis_kelamin' => $this->jenis_kelamin,
            'id_tahun' => $this->id_tahun,
            'nama_wali' => $this->nama_wali,
            'foto' => $photo,
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
