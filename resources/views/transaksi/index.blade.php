@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Transaksi</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <br>
                        <div class="col-sm-12">
                            <form method="GET" action=" {{ route('transaksi.get') }}" class="form-horizontal">
                                <div class="col-sm-12">
                                    <form action="{{ route('transaksi.get') }}" method="GET" class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <div class="input-group">
                                                    <input class="form-control" id="input2-group2" name="id" placeholder="MASUKAN NOMER INDUK SISWA / SANTRI"><span class="input-group-append">
                                                        <button class="btn btn-primary" type="submit">Submit</button></span>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <br>
                            </form>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('javascript')

    @endsection
