<div class="d-flex flex-wrap">

    @if($detail)

    @if($jenis)

    @livewire('transaksi.bulanan', ['id' => $t, 'Idsantri' => $Idsantri], key($t))

    @else
    @livewire('transaksi.tahunan', ['id' => $t, 'Idsantri' => $Idsantri], key($t))
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
                                    <td>{{FormatRupiah($data->tunggakan)}}</td>
                                    <td>{{FormatRupiah($data->dibayar)}}</td>
                                    <td>{{FormatRupiah($data->total)}}</td>
                                    <td>
                                        @if($data->status == 0)
                                        <span class="badge badge-success">lunas</span>
                                        @else
                                        <span class="badge badge-danger">belum lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="detail({{$data->id_tagihan}}, '{{$Idsantri}}')" class="btn btn-success">Bayar</button>
                                    </td>

                                    <td><a target="_blank" class="btn btn-primary" href="{{route('transaksi.cetak',[ 'Idsantri' => $Idsantri, 'Idtagihan' => $data->id_tagihan  ])}}" role="button">Cetak</a></td>

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
                                    <td>{{FormatRupiah($data->total - $data->bayar_count)}}</td>
                                    <td>{{FormatRupiah($data->bayar_count)}}</td>
                                    <td>{{FormatRupiah($data->total)}}</td>
                                    <td>
                                        @if($data->total - $data->bayar_count == 0)
                                        <span class="badge badge-success">lunas</span>
                                        @else
                                        <span class="badge badge-danger">belum lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button wire:click="periode('{{$data->id}}', '{{$data->jenis->nama}}')" class="btn btn-success">Bayar</button>
                                    </td>
                                    <td><a target="_blank" class="btn btn-primary" href="{{route('transaksi.cetakc',[ 'Idsantri' => $Idsantri, 'Idtagihan' => $data->id ])}}" role="button">Cetak</a></td>

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
