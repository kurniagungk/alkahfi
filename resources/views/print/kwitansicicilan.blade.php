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




            <tr>
                <td>1</td>
                <td>{{Date_format($data['tagihan']->created_at, "d/m/Y")}}</td>
                <td>{{$data['tagihan']->jumlah }}</td>

            </tr>
        </tbody>
        <tfoot>

        </tfoot>
    </table>

    @include('print.footer')

</body>

</html>
