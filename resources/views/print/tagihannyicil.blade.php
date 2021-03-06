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
                <th>Tanggal Bayar </th>
                <th>Jumlah</th>

            </tr>
        </thead>
        <tbody>

            @foreach($data['tagihan'] as $tagihan)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{Date_format($tagihan->created_at, "d/m/Y")}}</td>
                <td>{{$tagihan->jumlah }}</td>

            </tr> @endforeach </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td align="right">Total Tagihan</td>
                <td align="right">{{FormatRupiah($data['detail']->total)}}</td>
            </tr>
            <tr>
                <td></td>
                <td align="right">Dibayar</td>
                <td align="right">{{FormatRupiah($data['detail']->bayar_count)}}</td>
            </tr>
            <tr>
                <td></td>
                <td align="right">Sisa Tunggakan</td>
                <td align="right">{{FormatRupiah($data['detail']->total - $data['detail']->bayar_count )}}</td>
            </tr>
        </tfoot>
    </table>

    @include('print.footer')

</body>

</html>
