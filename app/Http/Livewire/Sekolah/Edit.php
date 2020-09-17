<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Sekolah;

class Edit extends Component
{
    use WithFileUploads;
    public $sekolah_id;
    public $nama;
    public $alamat;
    public $keterangan;
    public $logo;
    public $Newlogo;

    public function mount(Sekolah $sekolah)
    {
        $this->nama = $sekolah->nama;
        $this->keterangan = $sekolah->keterangan;
        $this->sekolah_id = $sekolah->id;
        $this->logo = $sekolah->logo;
        $this->alamat = $sekolah->alamat;
    }

    public function render()
    {
        return view('livewire.sekolah.edit');
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|',
            'keterangan' => 'required|',
            'alamat' => 'required|',
        ]);

        if ($this->Newlogo) {

            $validatedData = $this->validate([
                'Newlogo' => 'image|max:2048',
            ]);

            Storage::disk('public')->delete($this->logo);

            $Newlogo = $this->Newlogo->store('logo', 'public');

            $this->logo = $Newlogo;
        }

        $data = array(
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,
            'alamat' => $this->alamat,
            'logo' => $this->logo,
        );


        Sekolah::where('id', $this->sekolah_id)
            ->update($data);
        session()->flash('message',   'Data Sekolah berhasil di edit');
        return redirect()->route('sekolah');
    }
}
