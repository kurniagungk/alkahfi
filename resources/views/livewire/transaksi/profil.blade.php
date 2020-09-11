<div class="card">
    <div class="card-header">
        <h4>Profil</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <br>
        <div class="col-sm-12">

            @if($profil)
            <table class="table-responsive">
                <tbody>

                    <tr>
                        <td width="200">Tahun Ajaran</td>
                        <td width="4">:</td>
                        <td><b>Semua Tahun Ajaran<b></td>
                    </tr>
                    <tr>
                        <td>NISM</td>
                        <td>:</td>
                        <td>{{$profil->nism}}</td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td>{{$profil->nisn}}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{$profil->nama}}</td>
                    </tr>
                    <tr>
                        <td>Sekolah - Kelas</td>
                        <td>:</td>
                        <td>{{$profil->sekolah->nama}} - {{$profil->kelas->tingkat}} {{$profil->kelas->kelas}}</td>
                    </tr>
                    <tr>
                        <td>Asrama</td>
                        <td>:</td>
                        <td>{{$profil->asrama->nama}}</td>
                    </tr>

                </tbody>
            </table>

            @endif
            <br>

        </div><!-- /.box-body -->
    </div><!-- /.box -->

</div>