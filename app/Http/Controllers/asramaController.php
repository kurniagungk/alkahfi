<?php

namespace App\Http\Controllers;

use App\asrama;
use Illuminate\Http\Request;
use Redirect, Response, DB, Config;
use Validator;
use Datatables;
use Illuminate\Validation\Rule;

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

        $messages = [
            'kode.unique'    => 'KODE ASRAMA TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'kapasitas.required'    => 'JUMLAH TIDAK BOLEH KOSONG',
            'tipe.required'    => 'TIPE TIDAK BOLEH KOSONG',
            'keterangan.required'    => 'KETERANGAN TIDAK BOLEH KOSONG',
        ];

        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:asrama|max:255',
            'nama' => 'required',
            'kapasitas' => 'required',
            'tipe' => 'required|integer',
            'keterangan' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->route('asrama.create')
                ->withErrors($validator)
                ->withInput();
        }

        asrama::create($request->all());
        return redirect()->route('asrama.index')
            ->with('success', 'berhasil manambah data asrama');
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
        return view('asrama.edit', compact('asrama'));
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
        $messages = [
            'kode.unique'    => 'KODE ASRAMA TIDAK BOLEH SAMA',
            'nama.required'    => 'NAMA TIDAK BOLEH KOSONG',
            'kapasitas.required'    => 'JUMLAH TIDAK BOLEH KOSONG',
            'tipe.required'    => 'TIPE TIDAK BOLEH KOSONG',
            'keterangan.required'    => 'KETERANGAN TIDAK BOLEH KOSONG',
        ];

        $validator = Validator::make($request->all(), [
            'kode' => [
                'required',
                'max:255',
                Rule::unique('asrama')->ignore($asrama->kode, 'kode'),
            ],
            'nama' => 'required',
            'kapasitas' => 'required',
            'tipe' => 'required|integer',
            'keterangan' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->route('asrama.edit', $asrama)
                ->withErrors($validator)
                ->withInput();
        }
        $data = array(
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kapasitas' => $request->jumlah,
            'tipe' => $request->kelamin,
            'keterangan' => $request->keterangan,

        );


        asrama::where('id', $asrama->id)->update($data);

        return redirect()->route('asrama.index')
            ->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asrama  $asrama
     * @return \Illuminate\Http\Response
     */
    public function destroy(asrama $asrama)
    {
        $asrama->delete();
        return session()->flash('success', 'Data berhasil di hapus');
    }
    public function getBasicData()
    {
        $data = asrama::select([
            'id',
            'kode',
            'nama',
            'jumlah',
            'kelamin',
            'keterangan',
        ]);
        return datatables()->eloquent($data)
            ->orderColumn('nama', '-nama $1')
            ->addIndexColumn()
            ->removeColumn('id')
            ->addColumn(
                'aksi',
                function ($data) {
                    return
                        '<center>
                    <a href="' . route('asrama.edit', $data->id) . '" class="btn btn-ghost-warning btn-sm" role="button" aria-pressed="true">EDIT</a>
                    <button class="btn btn-ghost-danger btn-sm delete" id="' . $data->id . '" role="button" aria-pressed="true">HAPUS</button>
                 </center>';
                }
            )
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
