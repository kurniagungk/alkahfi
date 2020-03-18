@extends('dashboard.base')

@section('content')


<!-- form header -->
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Pembayaran</strong> Syahriah</div>
                    <div class="card-body">
                        <div class="container-fluid">

                            <div class="fade-in">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <div class="box box-warning box-solid">

                                                <div class="box-body" style="display: block;">
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
                                                            @foreach ($tagihan as $t)

                                                            @if ($t->status == 'lunas')
                                                            <tr style="color:green">
                                                                @elseif ($t->jatuh_tempo < '2020-01-01' ) <tr style="color:red">

                                                                    @else
                                                            <tr style="color:#f9b115">
                                                                @endif

                                                                <td>{{$loop->index +1}}</td>
                                                                <td>asd</td>
                                                                <td>{{$t->jumlah}}</td>
                                                                <td>
                                                                    @if ($t->status == 'lunas')
                                                                    <span class="badge badge-success">Lunas</span>
                                                                    @elseif ($t->jatuh_tempo < '2020-01-01' ) <span class="badge badge-danger">jatuh tempo</span>
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
                                            </div>

                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                </div>
                            </div>
                        </div>



                        <!-- end form -->
                    </div>

                </div>

                <!-- /.col-->
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

@endsection
