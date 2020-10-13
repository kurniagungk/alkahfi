<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


use App\santri;
use App\Bayar;
use App\Tagihan;

class Index extends Component
{



    public function render()
    {


        $user = Auth::user();

        $totalTransaksi = Bayar::with('santri')->whereRaw('Date(created_at) = "' . date("Y/m/d") . '"');
        $totalPembayaran = Bayar::whereRaw('Date(created_at) = "' . date("Y/m/d") . '"');
        $totalTunggakan = Tagihan::where('status', 'belum')
            ->whereHas('jenis', function (Builder $query) {
                $query->where('tipe', 'spp');
            });


        if (!$user->hasRole('admin')) {
            $totalSantri = Santri::where('sekolah_id', $user->sekolah_id)->count();

            $totalTransaksi->whereHas('santri', function (Builder $query) use ($user) {
                $query->where('sekolah_id', $user->sekolah_id);
            });
            $totalPembayaran->whereHas('santri', function (Builder $query) use ($user) {
                $query->where('sekolah_id', $user->sekolah_id);
            });
            $totalTunggakan->whereHas('santri', function (Builder $query) use ($user) {
                $query->where('sekolah_id', $user->sekolah_id);
            });
        } else {
            $totalSantri = Santri::all()->count();
        }









        $data = [
            'totalSantri' => $totalSantri,
            'totalTransaksi' => $totalTransaksi->count(),
            'totalPembayaran' => $totalPembayaran->sum('jumlah'),
            'totalTunggakan' => $totalTunggakan->sum('jumlah')
        ];

        return view('livewire.dashboard.index', compact("data"))
        ->extends('dashboard.base')
        ->section('content');
    }
}
