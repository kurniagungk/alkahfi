@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Laporan Umum</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="GET" action="" class="form-horizontal">
                            <input type="hidden" name="view" value="siswa">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <select id="kelas" name="kelas" class="form-control">
                                                <option value="" selected=""> - Pos Bayar - </option>
                                                <option value="1">ASRAMA</option>
                                                <option value="3">SEKOLAH</option>
                                                <option value="5">JENIS KELAMIN</option>
                                                <option value="6">TAHUN MASUK</option>

                                            </select>
                                        </td>
                                        <td>
                                            <select class="form-control" name="status">
                                                <option value="">- Jenis Bayar -</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Non Aktif">Non Aktif</option>
                                                <option value="Drop Out">Drop Out</option>
                                                <option value="Pindah">Pindah</option>
                                                <option value="Lulus">Lulus</option>
                                            </select>
                                        </td>
                                        <td>
                                        <input class="form-control" id="date-input" type="date" name="date-input" placeholder="- Tanggal Awal -">
                                        </td>
                                        <td>
                                        <input class="form-control" id="date-input" type="date" name="date-input" placeholder="- Tanggal Akhir -">
                                        </td>
                                        <td width="100">
                                            <input type="submit" name="tampil" value="Tampilkan" class="btn btn-primary pull-right">
                                        </td>
                                        <td>

                                            <span class="pull-right">
                                               <a class="btn btn-success" href="index.php?view=siswa&amp;act=tambah">Export Excell</a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>


                        <div class="row">
                            <div class="col-sm-12">
                                <table id="TabelSantri" class="table table-bordered table-striped table-condensed dataTable no-footer" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">

                                            <th class="sorting_asc" style="width: 50px;">ID</th>
                                            <th class="sorting" style="width: 50px;">TANGGAL</th>
                                            <th class="sorting" style="width: 110px;">POS BAYAR</th>
                                            <th class="sorting" style="width: 150px;">JENIS</th>
                                            <th class="sorting" style="width: 150px;">NAMA</th>
                                            <th class="sorting" style="width: 180px;">KETERANGAN</th>
                                            <th width="40" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 80px;">
                                                <center>Aksi</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>





@endsection

@section('javascript')
<!-- <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="js/app.js"></script>
<script>
    $(function() {
        $('#TabelSantri').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": "{{route('santri.GetData')}}",
                "type": "POST"
            },
            columns: [{
                    data: 'id_santri'
                },
                {
                    data: 'DT_RowIndex'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'asrama'
                },
                {
                    data: 'sekolah'
                },
                {
                    data: 'id_kelas'
                },
                {
                    data: 'jenis_kelamin'
                },
                {
                    data: 'alamat'
                },
                {
                    data: 'id_tahun'
                },
                {
                    data: 'aksi'
                }

            ]


        });
    });
</script> -->

@endsection