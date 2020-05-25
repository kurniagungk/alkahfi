<div style="display: inline-flex; flex-wrap:wrap;">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Tagihan Bulanan</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <br>
                <div class="col-sm-12">

                    <div class="col-sm-12">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Dibayar</th>
                                    <th>Tolat Tagihan</th>
                                    <th>Status</th>
                                    <th>Bayar</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($TagihanBulanan as $data)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$data->jenis->nama}}</td>
                                    <td>{{$data->tunggakan}}</td>
                                    <td>{{$data->dibayar}}</td>
                                    <td>{{$data->total}}</td>
                                    <td>
                                        @if($data->status == 0)
                                        <span class="badge badge-success">lunas</span>
                                        @else
                                        <span class="badge badge-danger">belum lunas</span>
                                        @endif
                                    </td>
                                    <td>Bayar</td>
                                    <td>Cetak</td>

                                </tr>

                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    <br>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Tagihan periode</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <br>
                <div class="col-sm-12">

                    <div class="col-sm-12">

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Dibayar</th>
                                    <th>Tolat Tagihan</th>
                                    <th>Status</th>
                                    <th>Bayar</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tagihanPeriode as $data)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$data->jenis->nama}}</td>
                                    <td>{{$data->tunggakan}}</td>
                                    <td>{{$data->dibayar}}</td>
                                    <td>{{$data->total}}</td>
                                    <td>
                                        @if($data->status == 0)
                                        <span class="badge badge-success">lunas</span>
                                        @else
                                        <span class="badge badge-danger">belum lunas</span>
                                        @endif
                                    </td>
                                    <td>Bayar</td>
                                    <td>Cetak</td>

                                </tr>

                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    <br>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

    </div>
</div>
