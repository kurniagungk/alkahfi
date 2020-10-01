<div class="container-fluid">
    <div class="fade-in">

        <div class="row">
            <div class="col-xl col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">
                            <a href="/laporan/umum" class="btn btn-light btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text">
                                    << Back to admin</span> </a> </h5> <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Export File :</div>
                                            <a class="dropdown-item" href="#">PDF</a>
                                            <a class="dropdown-item" href="#">Excell</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Hari / Tanggal : </label>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-8">
                                <div class="card-body">

                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal</label>
                                            <div class="col-sm-4">
                                                <input wire:model="awal" type="date" class="form-control @error('awal') is-invalid @enderror" id="inputPassword2">
                                                @error('awal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-1"></div>
                                            <div class="col-sm-4">
                                                <input wire:model="akhir" type="date" class="form-control @error('akhir') is-invalid @enderror" id="inputPassword2">
                                                @error('akhir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <center>
                                            <button wire:click="data" class="btn btn-info btn-icon-split" type="button">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-filter"></i>
                                                </span>
                                                <span class="text">Filter</span>
                                            </button>
                                        </center>

                                    </form>

                                </div>
                            </div>
                        </div>


                    </div> -->

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>KELAS</th>
                                    @foreach($tagihan as $t)
                                    <th>{{$t->nama}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($data as $d)
                                @php
                                $sum = 0;
                                @endphp
                                <tr>
                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$d['nama']}}</td>
                                    <td>{{$d['kelas']}}</td>
                                    @foreach ($d['tagihan'] as $dt)
                                    @php
                                    $sum += $dt->sum('bayar');
                                    @endphp
                                    <td>{{$dt->sum('bayar') ?? ''}}</td>
                                    @endforeach
                                    <td>{{$sum}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>