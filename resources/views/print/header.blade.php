<header>

    <table align="center">
        <tr>

            <td><img src="{{public_path('/public/logo/logo.jpeg')}}" width="70" height="70" alt="img"></td>
            <td>
                <center>
                    <font size="3">YAYASAN RUBATH AL KAHFI (YAKFI)</font><BR>
                    @hasrole('admin')
                    <font size="5"><b>PONDOK PESANTREN AL-KAHFI SOMALANGU<b></font><BR>
                    @else
                    <font size="5"><b>{{auth()->user()->sekolah->nama}}<b></font><BR>
                    @endhasrole

                    <font size="3"><i>Alamat: {{auth()->user()->sekolah->keterangan}}</i></font>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">

            </td>
        </tr>

    </table>
    <hr />
</header>
