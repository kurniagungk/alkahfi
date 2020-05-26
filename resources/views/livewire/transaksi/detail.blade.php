<div class="d-flex flex-wrap">

    @if($detail)
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
                                    <td>
                                        <button wire:click="detail({{$data->id_tagihan}}, '{{$data->jenis->nama}}')" class="btn btn-success">Bayar</button>
                                    </td>

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
                <h4>Tagihan Periode</h4>
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
                                    <td>
                                        <button wire:click="detail({{$data->id_tagihan}}, '{{$data->jenis->nama}}')" class="btn btn-success">Bayar</button>
                                    </td>
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




    @else

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$nama}}</h4>
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
                                    <th>Bulan</th>
                                    <th>Tagihan</th>
                                    <th>Status</th>
                                    <th>Tgl Bayar</th>
                                    <th>Opsi</th>
                                    <th>Bayar</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DetailTagihan as $t)

                                @if ($t->status == 'lunas')
                                <tr style="color:green">
                                    @elseif ($t->jatuh_tempo < date("Y-m-d") ) <tr style="color:red">

                                        @else
                                <tr style="color:#f9b115">
                                    @endif

                                    <td>{{$loop->index +1}}</td>
                                    <td>asd</td>
                                    <td>{{$t->jumlah}}</td>
                                    <td>
                                        @if ($t->status == 'lunas')
                                        <span class="badge badge-success">Lunas</span>
                                        @elseif ($t->jatuh_tempo < date("Y-m-d") ) <span class="badge badge-danger">jatuh tempo</span>
                                            @else
                                            <span class="badge badge-warning">Belum Bayar</span>
                                            @endif
                                    </td>
                                    <td>12-03-2020</td>
                                    <td>Tunai</td>
                                    <td width="40" style="text-align:center">
                                        @if ($t->status == 'lunas')
                                        <button class="btn btn-sm btn-success" type="submit"> bayar</button>
                                        @else
                                        <button class="btn btn-sm btn-danger" type="submit"> Hapus</button>
                                        @endif

                                    </td>
                                    <td width="40" style="text-align:center">
                                        <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
                                    </td>
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
    <div class="col-sm-12" style="visibility: hidden;">
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


                            </tbody>

                        </table>

                    </div>
                    <br>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>

    </div>

    @endif



</div>
