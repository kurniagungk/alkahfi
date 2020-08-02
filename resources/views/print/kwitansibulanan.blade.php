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

    <table width="100%">
        <tr>
            <td valign="top"><img alt="" width="150" /></td>
            <td align="right">
                <h3>Alkahfi</h3>
            </td>
        </tr>

    </table>
    <table width="100%">
        <tr>
            <td><strong>Tagihan:</strong> {{$data['detail']->jenis->nama}}</td>

        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>Bulan</th>
                <th>Tagihan</th>
                <th>Tanggal Bayar </th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            @foreach($data['tagihan'] as $tagihan)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{date('F', strtotime($tagihan->jatuh_tempo))}}</td>
                <td>{{FormatRupiah($tagihan->jumlah)}}</td>
                <td>{{ $tagihan->updated_at ? Date_format($tagihan->updated_at, "d/m/Y"): null }}</td>
                <td>
                    @if ($tagihan->status == 'lunas')
                    Lunas
                    @elseif ($tagihan->jatuh_tempo < date("Y-m-d") ) jatuh tempo @else Belum Bayar @endif </td> </tr> @endforeach </tbody> <tfoot>
                        </tfoot>
    </table>

</body>

</html>
