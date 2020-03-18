@extends('dashboard.base')


@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Input</strong> Jenis Bayar</div>
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
                                <label class="col-md-3 col-form-label" for="select1">Pos Bayar</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="select1" name="sekolah">
                                        <option value="0">- Pilih Lembaga -</option>
                                        <option value="1">Pondok</option>
                                        <option value="2">SMK</option>
                                        <option value="3">SMA</option>
                                        <option value="3">SMP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Nama Pembayaran</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="nama" placeholder=". . ."><span class="help-block">* Sesuaikan Penulisan</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Tipe Bayar</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="select1" name="sekolah">
                                        <option value="0">- Pilih Tipe -</option>
                                        <option value="1">Bulanan</option>
                                        <option value="2">Tahunan</option>
                                        <option value="3">Bebas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Metode Bayar</label>
                                <div class="col-md-9 col-form-label">
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio1" type="radio" value="1" name="jenis_kelamin">
                                        <label class="form-check-label" for="inline-radio1">Lunas</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-1">
                                        <input class="form-check-input" id="inline-radio2" type="radio" value="2" name="jenis_kelamin">
                                        <label class="form-check-label" for="inline-radio2">Angsuran</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Tahun Ajaran</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="select1" name="sekolah">
                                        <option value="0">- Pilih -</option>
                                        <option value="1">2020 / 2021</option>
                                        <option value="2">2021 / 2022</option>
                                        <option value="3">2022 / 2023</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Jumlah Tarif</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="text-input" type="text" name="nama_wali" placeholder="Rp. . . .">
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