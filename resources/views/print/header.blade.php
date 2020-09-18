<header>

    <table align="center">
        <tr>

            <td>
                @hasrole('admin')
                <img src="{{public_path('/public/logo/yakfi.png')}}" width="70" height="70" alt="img">
                @else
                <img src="{{public_path('/public/'. auth()->user()->sekolah->logo)}}" width="70" height="70" alt="img">
                @endhasrole
            </td>
            <td align="center">

                @hasrole('admin')
                <font size="3">YAYASAN RUBATH AL KAHFI (YAKFI)</font><BR>
                <font size="5"><b>PONDOK PESANTREN AL-KAHFI SOMALANGU<b></font><BR>
                <font size="3"><i>Sekretariat : Ds. Sumberadi Po Box.32 Kebumen 54351 Telp. (0287) 3870814</i></font>
                @else
                @if(auth()->user()->sekolah->id > 2)
                <font size="3">YAYASAN RUBATH AL KAHFI (YAKFI)</font><BR>
                @else
                <font size="3">LEMBAGA PENDIDIKAN MA’ARIF NU KABUPATEN KEBUMEN</font><BR>
                @endif
                <font size="5"><b>{{auth()->user()->sekolah->nama}}<b></font><BR>
                <font size="2"><i>Alamat: {{auth()->user()->sekolah->alamat}}</i></font><br>
                <font size="2"><i>{{auth()->user()->sekolah->keterangan}}</i></font>
                @endhasrole



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
