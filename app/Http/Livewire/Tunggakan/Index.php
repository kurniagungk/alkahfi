<?php

namespace App\Http\Livewire\Tunggakan;


use Livewire\Component;
use Illuminate\{Support\Facades\DB, Support\Facades\Auth};
use App\Exports\TunggakanExpor;
use Maatwebsite\Excel\Facades\Excel;
use App\{Sekolah, Jenis_tagihan, santri};

class Index extends Component
{

    public $awal;
    public $akhir;
    public $periode;
    public $jenis;
    public $sekolah;

    public $dataSekolah;
    public $dataJenis;
    public $dataTunggakan;

    public function mount()
    {
        $this->dataSekolah = Sekolah::get();
    }

    public function updatedperiode($value)
    {
        $this->reset('jenis');
        $this->dataJenis = Jenis_tagihan::where('tipe', $value)->with('tahun')->get();

        if (is_null($this->dataJenis)) {
            dd($this->dataJenis);
            $this->jenis = $this->dataJenis['0']->daftar_tgh_id;

            $awal = date_create_from_format('Y-m-d', substr($this->dataJenis['0']->tahun->awal, 0, 8) . '01');
            $akhir = date_create_from_format('Y-m-d', substr($this->dataJenis['0']->tahun->akhir, 0, 8) . '01');
            $selisih = date_diff($awal, $akhir);

            $this->tahun = array(
                'awal' => $awal,
                'akhir' => $akhir,
                'selisih' => $selisih->m
            );
        }
    }

    public function data()
    {
        $tunggakan = santri::with('kelas');

        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            $tunggakan->where('kelas_id', $user->sekolah_id);
        } else {
            $tunggakan->with('sekolah');
        }

        if ($this->periode) {
            $this->validate([
                'jenis' => 'required|',
            ]);

            $jenis = $this->jenis;

            $tunggakan->whereHas('tagihan', function ($query) use ($jenis) {
                $query->where('jenis_tagihan_id', $jenis);
            });
        }
        $jenis = $this->jenis;
        $this->dataTunggakan = $tunggakan->with(['tagihan' => function ($query) use ($jenis) {
            if ($this->periode) {
                $query->where('jenis_tagihan_id', $jenis);
            }
            $query->where('tempo', '<', date('Y-m-d'));
            $query->where('status', 'belum');
            $query->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }]);
        }])
            ->get();
    }

    public function export()
    {
        Excel::store(new TunggakanExpor($this->dataTunggakan), 'export\tunggakan.xlsx', 'public');
        $this->emit('download');
    }

    public function render()
    {
        return view('livewire.tunggakan.index');
    }
}
