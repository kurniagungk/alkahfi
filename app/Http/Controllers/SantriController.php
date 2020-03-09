<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\Santri;
use Redirect, Response, DB, Config;
use Validator;

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


        $messages = [
            'no_induk.required'    => 'NIS TIDAK BOLEH KOSONG',
            'no_induk.unique'    => 'NIS TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'tgl_lahir.required'    => 'TANGGAL LAHIR TIDAK BOLEH KOSONG',
            'alamat.required'    => 'ALAMAT TIDAK BOLEH KOSONG',
            'sekolah.required'    => 'SEKOLAH TIDAK BOLEH KOSONG',
            'asrama.required'    => 'ASRAMA TIDAK BOLEH KOSONG',
            'jenis_kelamin.required'    => 'JENIS KELAMIN TIDAK BOLEH KOSONG',
            'id_tahun.required'    => 'TAHUN MASUK TIDAK BOLEH KOSONG',
            'nama_wali.required'    => 'NAMA WALI TIDAK BOLEH KOSONG',
            'tempat_lahir.required'    => 'TEMPAT LAHIR TIDAK BOLEH KOSONG',
            'telepon.required'    => 'NO HP TIDAK BOLEH KOSONG',
            'foto.required'    => 'FOTO TIDAK BOLEH KOSONG',


        ];



        $validator = Validator::make($request->all(), [ // <---
            'no_induk' => 'required|unique:santri|max:255',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'date',
            'alamat' => 'required',
            'sekolah' => 'required',
            'asrama' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'id_tahun' => 'required',
            'nama_wali' => 'required',
            'foto' => 'required|image',
        ], $messages);




        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            Santri::create($request->all());
            return redirect()->route('Santri.Index')
                ->with('success', 'berhasil manambah data santri');
        }
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
