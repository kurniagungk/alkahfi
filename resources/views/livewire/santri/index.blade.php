<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Santri</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <form method="GET" action="" class="form-horizontal">
                        <input type="hidden" name="view" value="siswa">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <select id="kelas" name="kelas" class="form-control">
                                            <option value="" selected=""> - Pilih Filter - </option>
                                            <option value="1">ASRAMA</option>
                                            <option value="3">SEKOLAH</option>
                                            <option value="5">JENIS KELAMIN</option>
                                            <option value="6">TAHUN MASUK</option>

                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" name="status">
                                            <option value="">- Rincian Filter -</option>
                                            <option value="Aktif">Aktif</option>
                                            <option value="Non Aktif">Non Aktif</option>
                                            <option value="Drop Out">Drop Out</option>
                                            <option value="Pindah">Pindah</option>
                                            <option value="Lulus">Lulus</option>
                                        </select>
                                    </td>
                                    <td width="100">
                                        <input type="submit" name="tampil" value="Tampilkan" class="btn btn-primary pull-right">
                                    </td>
                                    <td>

                                        <span class="pull-right">
                                            <a class="btn btn-warning" href="index.php?view=siswa&amp;act=import">
                                                <i class="fa fa-file-excel-o"></i> Import Data Santri
                                            </a>
                                            <a class="btn btn-success" href="{{route('santri.create')}}">Tambahkan Data</a>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    <div class="form-row align-items-center">
                        <div class="col-sm-3 my-2 ">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="c-icon cil-search"></i>
                                    </div>
                                </div>
                                <input wire:model="search" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                            </div>
                        </div>

                        <div class="col-sm-3 my-1 mx-3">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Show
                                    </div>
                                </div>
                                <select wire:model="perpage" class="form-control" name="status">
                                    <option value="10">10</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="">Semua</option>
                                </select>



                            </div>
                        </div>



                    </div>

                    <table id="TabelSantri" class="table table-responsive-sm" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th> <a wire:click.prevent="sortBy('no_induk')" role="button">
                                        Nis
                                        <i class="cil-resize-height" @if($sortField=='no_induk' ) style="color:red" @endif></i>
                                    </a></th>
                                <th><a wire:click.prevent="sortBy('nama')" role="button">
                                        Nama
                                        <i class="cil-resize-height" @if($sortField=='nama' ) style="color:red" @endif></i>
                                    </a></th>
                                <th>ASRAMA</th>
                                <th>JK</th>
                                <th>Alamat</th>
                                <th>MASUK </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending">
                                    <center>Aksi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($santri as $data)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$data->nis}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{optional($data->asrama)->nama}}</td>
                                <td>{{$data->jenis_kelamin}}</td>
                                <td>
                                    {{$data->desa->nama}},
                                    {{$data->kecamatan->nama}},
                                    {{$data->kabupaten->nama}},
                                    {{$data->provinsi->nama}}
                                </td>
                                <td>{{$data->tahun}}</td>
                                <td>
                                    <center>
                                        <a href="{{route('santri.edit', $data)}}" class="btn btn-primary" role="button" aria-pressed="true">EDIT</a>
                                        @if($confirming == $data->id)
                                        <button wire:click="kill('{{ $data->id }}')" type="button" class="btn btn-danger">Sure?</button>
                                        @else
                                        <button wire:click="confirmDelete( '{{ $data->id }}' )" type="button" class="btn btn-warning">Delete</button>
                                        @endif
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $santri->onEachSide(1)->links() }}
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>