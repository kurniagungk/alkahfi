@extends('dashboard.base')


@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Input</strong> Pos Bayar</div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="form-horizontal" action="{{ route('santri.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="form-group row">
                                <label class="col-md-3 col-form-label">Static</label>
                                <div class="col-md-9">
                                    <p class="form-control-static">Username</p>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">Nama Lembaga</label>
                                  <div class="col-md-9">
                                      <input class="form-control" type="text" name="nama" placeholder=". . ."><span class="help-block">* Sebagai pos administrasi keuangan</span>
                                  </div>
                              </div>
                            <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="textarea-input">Keterangan</label>
                                  <div class="col-md-9">
                                      <textarea class="form-control" id="textarea-input" name="keterangan" rows="5" placeholder=" . . ."></textarea>
                                  </div>
                              </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success" type="submit"> Simpan</button>
                        <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- /.col-->
        </div>
    </div>

</div>


@endsection


@section('javascript')

@endsection