<div class="col-sm-12">
    <div class="row">

        <div class="col-sm-4 col-md-4">
            <div class="card border-info">
                <div class="card-header">detail</div>
                <div class="card-body">

                    @foreach($Tagihan as $data)

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Nama Tagihan</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{$data->jenis->nama}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Total Tagihan</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{FormatRupiah($data->total)}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Tunggakan</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{FormatRupiah($data->tunggakan)}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Dibayar</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{FormatRupiah($data->dibayar)}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Status</label>
                        <div class="col-md-6">
                            @if($data->status == 0)
                            <span class="badge badge-success">lunas</span>
                            @else
                            <span class="badge badge-danger">belum lunas</span>
                            @endif
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>


        <div class="col-sm-8">

            <div class="card">
                <div class="card-header">
                    <h4>Detail</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>




                    @if (session()->has('message'))
                    {!! session('message')!!}
                    @endif
                    <div class="col-sm-12">

                        <table class="table table-striped">

                            <thead>
                                <tr>
                                    <th>#</th>
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
                                    <td>
                                        <div class="form-check">
                                            <input wire:model="select" type="checkbox" class="form-check-input" value="{{$t->id}}">
                                        </div>
                                    </td>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{date('F', strtotime($t->updated_at))}}</td>
                                    <td>{{FormatRupiah($t->jumlah)}}</td>
                                    <td>
                                        @if ($t->status == 'lunas')
                                        <span class="badge badge-success">Lunas</span>
                                        @elseif ($t->jatuh_tempo < date("Y-m-d") ) <span class="badge badge-danger">jatuh tempo</span>
                                            @else
                                            <span class="badge badge-warning">Belum Bayar</span>
                                            @endif
                                    </td>
                                    <td>{{ $t->updated_at ? Date_format($t->updated_at, "d/m/Y"): null }}</td>
                                    <td>Tunai</td>
                                    <td width="40" style="text-align:center">
                                        @if ($t->status == 'belum')
                                        <button wire:click="bayar({{$t->id}})" class=" btn btn-sm btn-success"> Bayar</button>
                                        @else
                                        <button wire:click="hapus({{$t->id}})" class="btn btn-sm btn-danger"> Hapus</button>
                                        @endif

                                    </td>
                                    <td width="40" style="text-align:center">
                                        <a class="btn btn-sm btn-primary" type="button"> Cetak</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>


                        <br>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>

        </div>
    </div>





</div>
