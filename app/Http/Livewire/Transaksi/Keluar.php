<?php

namespace App\Http\Livewire\Transaksi;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Jenis_tagihan;
use App\Pengeluaran;
use App\Transaksi;

class Keluar extends Component
{

    public $nama;
    public $jenisTagihan;
    public $jumlah;
    public $keterangan;

    public function save()
    {

        $userId = Auth::id();

        $this->validate([
            'nama' => 'required',
            'jenisTagihan' => 'required',
            'keterangan' => 'required',
            'jumlah' => 'required|numeric|min:1',
        ]);
        $pengeluaran = Pengeluaran::create([
            'id' => Str::Uuid(),
            'transaksi_id' => Str::Uuid(),
            'user_id' => $userId,
            'jenis_tagihan_id' => $this->jenisTagihan,
            'keterangan' => $this->keterangan,
            'jumlah' => $this->jumlah
        ]);

        $Transaksi = Transaksi::create([
            'id' => $pengeluaran->transaksi_id,
            'jumlah' => $pengeluaran->jumlah,
            'tipe' => 2,
            'user_id' => $userId
        ]);


        $this->reset();
        session()->flash('message', '<div class="alert alert-success">
                    pengluaran berhasil di tambahkan
                </div>');
    }

    public function render()
    {

        $jenis = Jenis_tagihan::get();
        return view('livewire.transaksi.keluar', compact('jenis'));
    }
}
