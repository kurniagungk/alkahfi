<?php

namespace App\Http\Controllers;

use App\asrama;
use Illuminate\Http\Request;

class asramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asrama.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asrama.create');
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
     * @param  \App\asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function show(asrama $asrama)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function edit(asrama $asrama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asrama $asrama)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function destroy(asrama $asrama)
    {
        //
    }
    public function getBasicData()
    {

        return datatables()->eloquent(asrama::query())

            ->only(['kode', 'nama', 'jenis_kelamin', 'jumlah', 'kelamin', 'Keterangan'])
            ->orderColumn('nama', '-nama $1')
            ->addIndexColumn()
            ->addColumn(
                'aksi',
                function ($santri) {
                    return
                        '<center>
                    <button class="btn btn-sm btn-success" type="submit"> Edit</button>
                    <button class="btn btn-sm btn-danger" type="reset"> Hapus</button>
                 </center>';
                }
            )
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
