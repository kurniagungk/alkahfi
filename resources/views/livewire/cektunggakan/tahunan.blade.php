<div class="row">
    <div class="col-sm-4 col-md-4">
        <div class="card border-info">
            <div class="card-header">Info</div>
            <div class="card-body">


                <div class="form-group row">
                    <label class="col-6 col-form-label">Nama Tagihan</label>
                    <div class="col-6">
                        <p class="form-control-static">{{$Tagihan->jenis->nama}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-6 col-form-label">Total Tagihan</label>
                    <div class="col-6">
                        <p class="form-control-static">{{FormatRupiah($Total)}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-6 col-form-label">Tunggakan</label>
                    <div class="col-6">
                        <p class="form-control-static">{{FormatRupiah($Tunggakan)}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-6 col-form-label">Dibayar</label>
                    <div class="col-6">
                        <p class="form-control-static">{{FormatRupiah($Dibayar)}}</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-6 col-form-label">Status</label>
                    <div class="col-6">
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
            <div class="card-body">
                <br>



                @if (session()->has('message'))
                {!! session('message')!!}
                @endif
                <div class="col-sm-12">


                    <table class="table table-striped">

                        <thead>
                            <tr>

                                <th>No.</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($DetailTagihan as $data)

                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->jumlah}}</td>

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
