<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\santri;
use Redirect, Response, DB, Config;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('santri.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('santri.create');
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
        return view('santri.edit');
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
    public function getBasicData()
    {

        return datatables()->eloquent(santri::query())

            ->only(['id_santri', 'no_induk', 'jenis_kelamin', 'nama', 'alamat', 'asrama', 'sekolah', 'id_kelas', 'id_tahun', 'aksi'])
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
