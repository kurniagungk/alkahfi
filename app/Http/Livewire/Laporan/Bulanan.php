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
    public $tanggal;


    public function export()
    {
        $user = Auth::user();

        $tanggal = $this->tanggal;
        $tahun = substr($this->tanggal, 0, 4);
        $bulan = substr($this->tanggal, 5, 2);


        $jenistagihan = Jenis_tagihan::with(['tagihan' => function ($query) use ($tahun, $bulan, $user) {

            $query->whereHas('santri', function (Builder $query) use ($user) {
                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);
            });


            $query->whereHas('bayar', function (Builder $query) use ($tahun, $bulan) {
                $query->whereYear('created_at', '=', $tahun);
                $query->whereMonth('created_at', '=', $bulan);
            });
            $query->withCount(['bayar AS bayar' => function ($query) {
                $query->select(DB::raw('SUM(JUMLAH)'));
            }]);
        }])
            ->with(['pengeluara' => function ($query) use ($tahun, $bulan, $user) {
                $query->whereYear('created_at', '=', $tahun);
                $query->whereMonth('created_at', '=', $bulan);
                if (!$user->hasRole('admin'))
                    $query->where('user_id', $user);
            }])
            ->get();


        Excel::store(new LaporanBulanan($jenistagihan, $this->tanggal), 'export\laporanbulanan.xlsx', 'public');
        $this->emit('download');
    }


    public function render()
    {
        return view('livewire.laporan.bulanan');
    }
}
