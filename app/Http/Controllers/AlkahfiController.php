<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlkahfiController extends Controller
{
    
    /** 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('menu.dasbor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function santri()
    {
        return view ('menu.santri');
    }
    /** 
     * @return \Illuminate\Http\Response
     */


    public function pengurus()
    {
        return view ('menu.pengurus');
    }


    /** 
     * @return \Illuminate\Http\Response
     */
    public function asrama()
    {
        return view ('menu.asrama');
    }


    /** 
     * @return \Illuminate\Http\Response
     */


    public function pos_uang()
    {
        return view ('menu.pos-keuangan');
    }


    /** 
     * @return \Illuminate\Http\Response
     */
    public function jns_bayar()
    {
        return view ('menu.jns-bayar');
    }
    

     /** 
     * @return \Illuminate\Http\Response
     */
    public function jurnal()
    {
        return view ('menu.jurnal');
    }

     /** 
     * @return \Illuminate\Http\Response
     */
    public function lap_byr_santri()
    {
        return view ('menu.lap_byr_santri');
    }

    /** 
     * @return \Illuminate\Http\Response
     */
    public function lap_syahriah()
    {
        return view ('menu.lap_syahriah');
    }

      /** 
     * @return \Illuminate\Http\Response
     */
    public function thn_ajaran()
    {
        return view ('menu.thn_ajaran');
    }

     /** 
     * @return \Illuminate\Http\Response
     */
    public function lap_maulid()
    {
        return view ('menu.lap_maulid');
    }

     /** 
     * @return \Illuminate\Http\Response
     */
    public function lap_khaul()
    {
        return view ('menu.lap_khaul');
    }

     /** 
     * @return \Illuminate\Http\Response
     */
    public function lap_daftarbaru()
    {
        return view ('menu.lap_daftarbaru');
    }

     /** 
     * @return \Illuminate\Http\Response
     */
    public function mutasi()
    {
        return view ('menu.mutasi');
    }
}
