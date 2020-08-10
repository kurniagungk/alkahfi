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

    <header>
        <table align="center">
            <tr>
                <td><img src="{{('../logo.png')}}" width="70" height="70"></td>
                <td>
                    <center>
                        <font size="5">YAYASAN RUBATH AL-KAHFI</font><BR>
                        <font size="6"><b>PONDOK PESANTREN AL-KAHFI SOMALANGU<b></font><BR>
                        <font size="3"><i>Sekretariat : Ds. Sumberadi Po Box.32 Kebumen 54351 Telp. (0287) 3870814</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">

                </td>
            </tr>

        </table>
    </header>

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
                <td>{{$t->santri->nis}}</td>
                <td>{{$t->santri->nama}}</td>
                <td>{{$t->jenis_tagihan->nama}}</td>
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
