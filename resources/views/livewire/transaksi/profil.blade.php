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
                        <td>NIS</td>
                        <td>:</td>
                        <td>{{$profil->nis}}</td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td>{{$profil->nama}}</td>
                    </tr>
                    <tr>
                        <td>Sekolah - Kelas</td>
                        <td>:</td>
                        <td>{{$profil->sekolah}}</td>
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
