<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarTagihan;
use App\Tagihan, App\Bayar;
use App\santri;
use Illuminate\Support\Facades\DB;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function cektunggakan($nis)
    {

        $santri = santri::select('id', 'NISN', 'NISM', 'nama')->where('nism', $nis)->orWhere('nisn', $nis)->first();

        $data = [];

        if (empty($santri))
            return $data['errors'] = ['status' => 404];

        $TagihanBulanan =  $this->bulan($santri->id);
        $Tagihanperiode =  $this->tahun($santri->id);





        $data['data'] = [
            'santri' =>  ['Nama = ' . $santri->nama, 'NISN = ' . $santri->NISN],
            'bulan' => $TagihanBulanan,
            'periode' => $Tagihanperiode
        ];

        return $data;
    }

    public function bulan($id)
    {

        $TagihanBulanan = Tagihan::select(
            'jenis_tagihan_id',
            'santri_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('santri_id', $id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('tipe', 1);
            })
            ->where('tempo', '<', date('Y-m-d'))
            ->groupBy('jenis_tagihan_id')
            ->get();
        $bulanan = [];
        $i = 1;
        foreach ($TagihanBulanan as $b) {
            if ($b->tunggakan == 0) continue;

            $data[] = $i . ' ' . $b->jenis->nama . ' ' . FormatRupiah($b->total - $b->bayar_count);;

            $bulanan[] = $data;
            $i++;
        }

        return $bulanan;
    }

    public function tahun($id)
    {

        $tagihanPeriode = Tagihan::select(
            'id',
            'jenis_tagihan_id',
            'santri_id',
            DB::raw('jumlah as total'),
            'status',
        )

            ->where('santri_id', $id)
            ->with('jenis')
            ->whereHas('jenis', function ($query) {
                $query->where('tipe', 2);
            })
            ->where('tempo', '<', date('Y-m-d'))
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])
            ->get();
        $bulanan = [];
        $i = 1;

        foreach ($tagihanPeriode as $d) {
            if ($d->total - $d->bayar_count == 0) continue;

            $data[] = $i . ' ' . $d->jenis->nama . ' ' . FormatRupiah($d->total - $d->bayar_count);
            $bulanan[] =  $data;
            $i++;
        }
        return $bulanan;
    }



    public function index()
    {
        //
        return view('transaksi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('transaksi.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bayarspp($santri, $tagihan)
    {
        //
        $tagihan = Tagihan::where('jenis_tagihan_id', $tagihan)
            ->get();

        return view('transaksi.bayarspp', ['tagihan' => $tagihan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bayartagihan($santri, $tagihan)
    {
        //
        $tagihan = Tagihan::where('jenis_tagihan_id', $tagihan)
            ->get();
        return view('transaksi.bayartagihan', compact('tagihan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function printTagihanBulanan($santri_id, $tagihan_id)
    {

        $santri = santri::find($santri_id);

        $tagihan =
            Tagihan::where('jenis_tagihan_id', $tagihan_id)
            ->Where('santri_id', $santri_id)
            ->with('bayarbulanan')
            ->get();

        $detail = Tagihan::select(
            'id',
            'jenis_tagihan_id',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->where('jenis_tagihan_id', $tagihan_id)
            ->Where('santri_id', $santri_id)
            ->first();


        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail

        ];

        $pdf = PDF::loadview('print.tagihanbulanan', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function printTagihanCicil($tagihan_id)
    {



        $tagihan =
            Bayar::where('tagihan_id', $tagihan_id)
            ->get();



        $detail =
            Tagihan::select(
                'id',
                'jenis_tagihan_id',
                'santri_id',
                DB::raw('sum(jumlah) as total'),
            )
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])
            ->with('jenis')
            ->where('id', $tagihan_id)
            ->first();

        $santri = santri::find($detail->santri_id);



        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail

        ];

        $pdf = PDF::loadview('print.tagihannyicil', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function kwitansiBulanan($id)
    {



        $tagihan =
            Tagihan::Where('id', $id)
            ->with('jenis')
            ->with('tahun')
            ->first();
        $santri = santri::find($tagihan->santri_id);



        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
        ];


        $pdf = PDF::loadview('print.kwitansib', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function kwitansicicilan($id)
    {
        $tagihan =
            Bayar::where('id', $id)
            ->first();



        $detail =
            Tagihan::Where('id', $tagihan->tagihan_id)
            ->with('jenis')
            ->with('tahun')
            ->first();
        $santri = santri::find($detail->santri_id);

        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail
        ];

        $pdf = PDF::loadview('print.kwitansicicilan', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream();
    }
}
