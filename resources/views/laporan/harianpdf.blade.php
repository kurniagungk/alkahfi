<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

        tr.border_bottom td {
            border-bottom: 1px solid black;
        }
    </style>

</head>

<body>



    <br>



    @foreach($data as $key => $tagihan)
    @if($tagihan->isEmpty())
    @continue
    @endif
    <a>{{$key}}</a>
    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th width="10">No</th>
                <th width="25%">No Induk</th>
                <th width="25%">Nama</th>
                <th width="20%">Pembayaran</th>
                <th width="20%">bayar</th>
            </tr>
        </thead>
        <tbody>

            @foreach($tagihan as $t)
            <tr>
                <td>{{$loop->index +1}}</td>
                <td>{{$t->santri->no_induk}}</td>
                <td>{{$t->santri->nama}}</td>
                <td>{{$t->daftartagihan->nama}}</td>
                <td>{{$t->jumlah}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <h3>Total pembayaran</h3>
                </td>
                <td>{{ $tagihan->sum('jumlah') }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    @endforeach

</body>


</html>
