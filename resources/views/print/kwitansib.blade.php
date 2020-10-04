<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>

<body>


    @include('print.header')
    <h3>
        <center>KWITANSI PEMBAYARAN</center>
    </h3>
    <table align="center">
        <td colspan="2">
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="93"><span>NIS</span></td>
                        <td width="200"><span>: &nbsp; <b>{{$data['santri']->nisn}}</b></span></td>
                    </tr>
                    <tr>
                        <td width="93"><span>Nama</span></td>
                        <td width="200"><span>: &nbsp; <b>{{$data['santri']->nama}}</b></span></td>
                    </tr>
                    <tr>
                        <td><span>Kelas</span></td>
                        <td><span>: &nbsp; <b>{{$data['santri']->kelas->tingkat}} - {{$data['santri']->kelas->kelas}}</b></span></td>
                    </tr>


                    <tr></tr>
                </tbody>
            </table>
        </td>
        <td colspan="2">
            <table width="100%">
                <tbody>
                    <tr>
                        <td><span>Tahun Ajaran</span></td>
                        <td><span>: &nbsp; {{$data['tagihan']->tahun->nama}}</span></td>
                    </tr>
                    <tr>
                        <td><span>Tagihan</span></td>
                        <td><span>: &nbsp; <b>{{$data['tagihan']->jenis->nama}}</b></span></td>
                    </tr>
                    <tr>
                        <td><span>ID Transaksi</span></td>
                        <td><span>: &nbsp; {{substr($data['tagihan']->id, 0, 8)}}</span></td>
                    </tr>

                </tbody>
            </table>
        </td>
    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>
                    <center>No</center>
                </th>
                <th>Bulan</th>
                <th>Tagihan</th>
                <th>Tanggal Bayar </th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <center>1</center>
                </td>
                <td>{{date('F', strtotime($data['tagihan'] ->tempo))}}</td>
                <td>{{FormatRupiah($data['tagihan'] ->jumlah)}}</td>
                <td>{{ $data['tagihan']->updated_at ? Date_format($data['tagihan'] ->updated_at, "d/m/Y"): null }}</td>
                <td>Lunas</td>
            </tr>
        </tbody>
    </table>
    @include('print.footer')
</body>

</html>
