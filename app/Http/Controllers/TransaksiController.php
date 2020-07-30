<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarTagihan;
use App\Tagihan, App\Bayar;
use App\santri;
use App\asrama;
use Illuminate\Support\Facades\DB;
use PDF;
use phpDocumentor\Reflection\DocBlock\Tag;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $tagihan = Tagihan::where('id_tagihan', $tagihan)
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
        $tagihan = Tagihan::where('id_tagihan', $tagihan)
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



    public function printTagihanBulanan($Idsantri, $Idtagihan)
    {

        $santri = santri::find($Idsantri);

        $tagihan =
            Tagihan::where('id_tagihan', $Idtagihan)
            ->Where('id_santri', $Idsantri)
            ->with('bayarbulanan')
            ->get();

        $detail = Tagihan::select(
            'id',
            'id_tagihan',
            DB::raw('sum(jumlah) as total'),
            DB::raw('sum(if(jatuh_tempo < CURDATE() AND status = "belum" ,jumlah, 0 )) as tunggakan'),
            DB::raw('sum(if(status = "lunas",jumlah, 0 )) as dibayar'),
            DB::raw('sum(jumlah) - sum(if(status = "lunas", jumlah, 0)) as status'),
        )
            ->with('jenis')
            ->where('id_tagihan', $Idtagihan)
            ->Where('id_santri', $Idsantri)
            ->first();


        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail

        ];

        $pdf = PDF::loadview('print.tagihanbulanan', compact('data'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function printTagihanCicil($Idsantri, $IdTagihan)
    {

        $santri = santri::find($Idsantri);

        $tagihan =
            Bayar::where('id_tagihan', $IdTagihan)
            ->get();

        $detail =
            Tagihan::select(
                'id',
                'id_tagihan',
                'id_santri',
                DB::raw('sum(jumlah) as total'),
            )
            ->withCount(['bayar' => function ($query) {
                $query->select(DB::raw('sum(jumlah) as dibayar'));
            }])
            ->with('jenis')
            ->where('id', $IdTagihan)
            ->first();




        $data = [
            'santri' => $santri,
            'tagihan' => $tagihan,
            'detail' => $detail

        ];

        $pdf = PDF::loadview('print.tagihannyicil', compact('data'));
        return $pdf->stream();
    }
}
