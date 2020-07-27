<div class="d-flex flex-wrap">

    @if($detail)

    @if($jenis)

    @livewire('transaksi.bulanan', ['id' => $t, 'nama' => $nama], key($t))

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
                                    <td> {{FormatRupiah($t->jumlah)}}</td>
                                </tr>
                                <tr>
                                    <td>Di Bayar</td>
                                    <td> : </td>
                                    <td> {{FormatRupiah($t->jumlah)}}</td>
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


                                @foreach ($DetailBayar as $d)


                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$d['tanggal']}}</td>
                                    <td>{{$d['jumlah']}}</td>
                                    <td width="40" style="text-align:center">
                                        <button wire:click="hapusp('{{$d["id_transaksi"]}}')" class=" btn btn-sm btn-danger"> hapus</button>
                                    </td>
                                    <td width="40" style="text-align:center">
                                        <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td><input class="form-control" readonly type="date" name="date-input" value="{{date('Y-m-d')}}"></td>
                                    <td><input class="form-control" wire:model="biaya" type="number"></td>
                                    <td width="40" style="text-align:center">

                                        <button wire:click="bayarp({{$t}})" class=" btn btn-sm btn-success"> Bayar</button>

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
                                        <button wire:click="periode('{{$data->id}}', '{{$data->jenis->nama}}')" class="btn btn-success">Bayar</button>
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