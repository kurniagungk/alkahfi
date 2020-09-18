<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\santri;
use Redirect, Response, DB, Config;
use Validator;
use Illuminate\Validation\Rule;

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
    public function edit(santri $santri)
    {
        //
        return view('santri.edit', compact('santri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        //
        $CekImage = $request->foto;

        if ($CekImage == null) {
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

            ];

            $validator = Validator::make($request->all(), [
                'no_induk' => [
                    'required',
                    'max:255',
                    Rule::unique('santri')->ignore($santri->no_induk, 'no_induk'),
                ],
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
            ], $messages);

            $data = array(
                'no_induk' => $request->no_induk,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'sekolah' => $request->sekolah,
                'asrama' => $request->asrama,
                'telepon' => $request->telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_tahun' => $request->id_tahun,
                'nama_wali' => $request->nama_wali,
            );
        } else {
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

            $validator = Validator::make($request->all(), [
                'no_induk' => [
                    'required',
                    'max:255',
                    Rule::unique('santri')->ignore($santri->no_induk, 'no_induk'),
                ],
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
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], $messages);

            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images/santri'), $imageName);
            $data = array(
                'no_induk' => $request->no_induk,
                'nama' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
                'sekolah' => $request->sekolah,
                'asrama' => $request->asrama,
                'telepon' => $request->telepon,
                'jenis_kelamin' => $request->jenis_kelamin,
                'id_tahun' => $request->id_tahun,
                'nama_wali' => $request->nama_wali,
                'foto' => $imageName,
            );
        }

        if ($validator->fails()) {
            return redirect()->route('santri.edit', $santri->id_santri)
                ->withErrors($validator)
                ->withInput();
        }
        Santri::where('id_santri', $santri->id_santri)->update($data);
        return redirect()->route('santri.index')
            ->with('success', 'Data berhasil di update');
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
        Santri::where('id_santri', $id)
            ->delete();
        return session()->flash('success', 'Data berhasil di hapus');
    }
    public function getBasicData()
    {

        $santri = Santri::with('asrama');




        return datatables()->eloquent($santri)

            ->orderColumn('nama', '-nama $1')

            ->addColumn(
                'aksi',
                function ($santri) {
                    return
                        '<center>
                    <a href="' . route('santri.edit', $santri->id_santri) . '" class="btn btn-ghost-warning btn-sm" role="button" aria-pressed="true">EDIT</a>
                    <button class="btn btn-ghost-danger btn-sm delete" id="' . $santri->id_santri . '" role="button" aria-pressed="true">HAPUS</button>
                 </center>';
                }
            )
            ->addColumn(
                'asrama',
                function ($santri) {
                    return $santri->asrama->nama;
                }
            )
            ->only(['id_santri', 'aksi', 'no_induk', 'jenis_kelamin', 'nama', 'alamat', 'sekolah', 'id_kelas', 'id_tahun', 'asrama',])
            ->addIndexColumn()
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
