<?php

namespace App\Http\Livewire\Laporan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

use App\Exports\LaporanHarian;
use Maatwebsite\Excel\Facades\Excel;

use App\santri;
use App\Jenis_tagihan;
use App\Tagihan;


class Harian extends Component
{

    public $tanggal;


    public function export()
    {
        DB::enableQueryLog();

        // and then you can get q

        $user = Auth::user();
        $tanggal = $this->tanggal;

        $datasantri = santri::select('*')->whereHas('bayar', function (Builder $query) use ($tanggal) {
            $query->whereRaw("DATE(bayar.created_at) = '" . $tanggal . "'");
        });
        if (!$user->hasRole('admin'))
            $datasantri->where('sekolah_id', $user->sekolah_id);

        $santri = $datasantri->get();


        $jenistagihan = Jenis_tagihan::with(['tagihan' => function ($query) use ($tanggal, $user) {


            $query->whereHas('santri', function (Builder $query) use ($user) {
                if (!$user->hasRole('admin'))
                    $query->where('sekolah_id', $user->sekolah_id);
            });


            $query->whereHas('bayar', function (Builder $query) use ($tanggal) {
                $query->whereRaw("DATE(created_at) = '" . $tanggal . "'");
            });
            $query->withCount(['bayar AS bayar' => function ($query) use ($tanggal) {
                $query->select(DB::raw('SUM(JUMLAH)'));
            }]);
        }])
            ->get();

        $data = [];

        foreach ($santri as $s) {
            $datasantri = [];
            $datasantri['nama'] = $s->nama;
            $datasantri['kelas'] = $s->kelas->kelas;
            $datatagihan = [];
            foreach ($jenistagihan as $j) {

                $tagihan = Tagihan::where('santri_id', $s->id)
                    ->whereHas('bayar', function (Builder $query) use ($tanggal) {
                        $query->whereRaw("DATE(created_at) = '" . $tanggal . "'");
                    })
                    ->where('jenis_tagihan_id', $j->id)
                    ->withCount(['bayar AS bayar' => function ($query) {
                        $query->select(DB::raw('SUM(JUMLAH)'));
                    }])
                    ->get();



                $datatagihan[] = $tagihan;
            }
            $datasantri['tagihan'] = $datatagihan;
            $data[] = $datasantri;
        }
        $this->data = $data;

        Excel::store(new LaporanHarian($data, $jenistagihan, $this->tanggal), 'export\laporanharian.xlsx', 'public');
        $this->emit('download');
    }

    public function render()
    {
        return view('livewire.laporan.harian');
    }
}
