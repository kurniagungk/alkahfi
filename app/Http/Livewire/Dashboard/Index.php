<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

use App\santri;
use App\Bayar;
use App\Tagihan;

class Index extends Component
{



    public function render()
    {
        $totalSantri = Santri::all()->count();
        $totalTransaksi = Bayar::whereRaw('Date(created_at) = "' . date("Y/m/d") . '"')->count();
        $totalPembayaran = Bayar::whereRaw('Date(created_at) = "' . date("Y/m/d") . '"')->sum('jumlah');
        $totalTunggakan = Tagihan::where('status', 'belum')->sum('jumlah');

        $data = [
            'totalSantri' => $totalSantri,
            'totalTransaksi' => $totalTransaksi,
            'totalPembayaran' => $totalPembayaran,
            'totalTunggakan' => $totalTunggakan
        ];

        return view('livewire.dashboard.index', compact("data"));
    }
}
