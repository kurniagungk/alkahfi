<?php

use App\Transaksi;
use App\Bayar;



function FormatRupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function CodeBayar()
{
    $data = Bayar::latest()->first();
    if ($data) {
        $panjang = strlen($data->id_bayar);
        $angka        = substr($data->id_bayar, strlen("B"));
        $angka++;
        $angka    = strval($angka);



        $tmp    = "";
        for ($i = 1; $i <= ($panjang - strlen("B") - strlen($angka)); $i++) {
            $tmp = $tmp . "0";
        }

        return "B" . $tmp . $angka;
    }
    return "B" . '000000001';
}

function CodeTransaksi()
{
    $data = Transaksi::latest()->first();

    $date = date("Ymd");
    if ($data) {
        $panjang = strlen($data->id_transaksi);
        $angka        = substr($data->id_transaksi, strlen("TR") + 8);
        $angka++;
        $angka    = strval($angka);

        $tmp    = "";
        for ($i = 1; $i <= ($panjang - 8 - strlen("TR") - strlen($angka)); $i++) {
            $tmp = $tmp . "0";
        }

        return "TR" . $date . $tmp . $angka;
    }
    return "TR" . $date . '00001';
}
