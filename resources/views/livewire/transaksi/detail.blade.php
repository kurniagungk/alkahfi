<div class="d-flex flex-wrap">

    @if($detail)

    @if($jenis)
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{$nama}}</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <br>


                <div class="col-sm-12">
                    @if (session()->has('message'))
                    {!! session('message')!!}
                    @endif
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
                                        @if ($t->status == 'belum')
                                        <button wire:click="bayar({{$t->id}}, {{$t->id_tagihan}})" class=" btn btn-sm btn-success"> Bayar</button>
                                        @else
                                        <button wire:click="hapus({{$t->id}}, {{$t->id_tagihan}})" class="btn btn-sm btn-danger" type="submit"> Hapus</button>
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
                    @if (session()->has('message'))
                    {!! session('message')!!}
                    @endif
                    <div class="col-sm-12">

                        <table class="table-responsive">
                            <tbody>
                                @foreach ($DetailTagihan as $t)

                                <tr>
                                    <td>Tagihan</td>
                                    <td> : </td>
                                    <td> {{$t->jumlah}}</td>
                                </tr>
                                <tr>
                                    <td>Di Bayar</td>
                                    <td> : </td>
                                    <td> {{$t->jumlah}}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td> : </td>
                                    <td>
                                        @if ($t->status == 'lunas')
                                        <span class="badge badge-success">Lunas</span>
                                        @else
                                        <span class="badge badge-warning">Belum Bayar</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Bayar</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($DetailBayar as $t)


                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$t['tanggal']}}</td>
                                    <td>{{$t['jumlah']}}</td>
                                    <td width="40" style="text-align:center">
                                        <button class=" btn btn-sm btn-success"> Bayar</button>
                                    </td>
                                    <td width="40" style="text-align:center">
                                        <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><input class="form-control" type="date" name="date-input" value="{{date('Y-m-d')}}"></td>
                                    <td><input class="form-control" type="number"></td>
                                    <td width="40" style="text-align:center">
                                        <button class=" btn btn-sm btn-success"> Bayar</button>
                                    </td>
                                    <td width="40" style="text-align:center">
                                        <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                    <br>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    @endif

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



    @else



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
                                        <button wire:click="periode({{$data->id_tagihan}}, '{{$data->jenis->nama}}')" class="btn btn-success">Bayar</button>
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

    @endif



</div>
