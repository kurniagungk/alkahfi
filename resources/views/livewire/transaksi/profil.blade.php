<div class="card">
    <div class="card-header">
        <h4>Profil</h4>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <br>
        <div class="col-sm-12">

            <div class="col-sm-12">

                <table class="table-responsive">
                    <tbody>
                        @foreach ($profil as $s)
                        <tr>
                            <td width="200">Tahun Ajaran</td>
                            <td width="4">:</td>
                            <td><b>Semua Tahun Ajaran<b></td>
                        </tr>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td>{{$s->no_induk}}</td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td>{{$s->nama}}</td>
                        </tr>
                        <tr>
                            <td>Sekolah - Kelas</td>
                            <td>:</td>
                            <td>{{$s->sekolah}}</td>
                        </tr>
                        <tr>
                            <td>Asrama</td>
                            <td>:</td>
                            <td>{{$s->asrama->nama}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <br>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
