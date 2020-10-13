<?php

namespace App\Http\Livewire\Laporan;

use App\Exports\LaporanBulanan;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;



use App\Jenis_tagihan;


class Bulanan extends Component
{
    public $awal;
    public $akhir;


    public function export()
    {
        $user = Auth::user();

        $awal = $this->awal;
        $akhir = $this->akhir;



        $jenistagihan = Jenis_tagihan::with(['tagihan' => function ($query) use ($awal, $akhir, $user) {

            $query->whereHas('santri', function (Builder $query) use ($user) {
                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);
            });


            $query->whereHas('bayar', function (Builder $query) use ($awal, $akhir) {
                $query->whereRaw('DATE(created_at) BETWEEN "' . $awal . '" AND "' . $akhir . '"');
            });
            $query->withCount(['bayar AS bayar' => function ($query) {
                $query->select(DB::raw('SUM(JUMLAH)'));
            }]);
        }])
            ->with(['pengeluaran' => function ($query) use ($awal, $akhir, $user) {
                $query->whereRaw('DATE(created_at) BETWEEN "' . $awal . '" AND "' . $akhir . '"');
                if (!$user->hasRole('admin'))
                    $query->where('user_id', $user);
            }])
            ->get();

        $tanggal = [
            'awal' => $awal,
            'akhir' => $akhir
        ];

        return Excel::download(new LaporanBulanan($jenistagihan, $tanggal), 'laporan Bulanan '.$awal. ' - '. $akhir .'.xlsx');
    }


    public function render()
    {
        return view('livewire.laporan.bulanan')
        ->extends('dashboard.base')
        ->section('content');
    }
}
