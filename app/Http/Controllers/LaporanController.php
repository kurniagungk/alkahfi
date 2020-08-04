<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Bayar;
use App\Tagihan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function harian()
    {
        return view('laporan.harian');
    }

    public function harianpdf()
    {
        $date = '2020-08-02';
        // End date
        $end_date = '2020-08-04';


        $data = array();

        while (strtotime($date) <= strtotime($end_date)) {



            $bayar = Bayar::whereRaw('Date(created_at) = "' . date($date) . '"')
                ->with('santri')
                ->with('daftartagihan')
                ->get();




            $data[$date] = $bayar;
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
        }


        $pdf = PDF::loadview('laporan.harianpdf', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
