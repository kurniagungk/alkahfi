<div class="col-sm-12">

    <div class="row">
        <div class="col-sm-4 col-md-4">
            <div class="card border-info">
                <div class="card-header">Info</div>
                <div class="card-body">


                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Nama Tagihan</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{$Tagihan->jenis->nama}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Total Tagihan</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{FormatRupiah($Total)}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Tunggakan</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{FormatRupiah($Tunggakan)}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Dibayar</label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{FormatRupiah($Dibayar)}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-6 col-form-label">Status</label>
                        <div class="col-md-6">
                            @if($Tunggakan == 0)
                            <span class="badge badge-success">lunas</span>
                            @else
                            <span class="badge badge-danger">belum lunas</span>
                            @endif
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            <h4>Detail</h4>
                        </div>
                        <div class="col-2">
                            <button wire:click="cetak" class="btn btn-sm btn-danger"> Cetak</button>
                        </div>
                    </div>
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
                                    <th>Tanggal Bayar</th>
                                    <th>Jumlah</th>
                                    <th>Bayar</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>


                                @foreach ($DetailTagihan as $data)

                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input wire:key="{{ $loop->index }}" wire:model="select" type="checkbox" class="form-check-input" value="{{$data->id}}">
                                        </div>
                                    </td>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>{{$data->jumlah}}</td>
                                    <td width="40" style="text-align:center">
                                        <button wire:click="hapus('{{$data->id}}')" class=" btn btn-sm btn-danger"> hapus</button>
                                    </td>
                                    <td width="40" style="text-align:center">
                                        <a class="btn btn-sm btn-primary" target="_blank" type="button" href="{{route('transaksi.kwitansicicilan', ['id' => $data->id] )}}"> Cetak</a>
                                    </td>
                                </tr>
                                @endforeach

                                @if(intval($Tunggakan) > 0) <tr>
                                    <td></td>
                                    <td><input class="form-control" readonly type="date" name="date-input" value="{{date('Y-m-d')}}"></td>
                                    <td>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input wire:model="biaya" autofocus class="form-control @error('biaya') is-invalid @enderror" id="text-input" type="number" name="nama_wali">
                                                @error('biaya')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                    <td width="40" style="text-align:center">

                                        <button wire:click="bayar({{$IdTagihan}})" class=" btn btn-sm btn-success"> Bayar</button>

                                    </td>
                                    <td width="40" style="text-align:center">

                                    </td>
                                </tr>
                                @endif
                            </tbody>

                        </table>


                        <br>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </div>



</div>
