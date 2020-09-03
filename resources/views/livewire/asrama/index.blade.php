<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Asrama</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <form method="GET" action="" class="form-horizontal">
                        <input type="hidden" name="view" value="siswa">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="pull-right">
                                            <a class="btn btn-success" href="{{route('asrama.create')}}">Tambah Data</a>
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

                            <th>No</th>
                            <th> <a wire:click.prevent="sortBy('kode')" role="button">
                                    Kode
                                    <i class="cil-resize-height" @if($sortField=='kode' ) style="color:red" @endif></i>
                                </a></th>
                            <th><a wire:click.prevent="sortBy('nama')" role="button">
                                    Nama
                                    <i class="cil-resize-height" @if($sortField=='nama' ) style="color:red" @endif></i>
                                </a></th>
                            <th>Jumlah Kamar</th>
                            <th>Type</th>
                            <th>KETERANGAN</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending">
                                <center>Aksi</center>
                            </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asrama as $data)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$data->kode}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->kapasitas}}</td>
                                <td>{{$data->tipe}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td>

                                    <a href=" {{route('asrama.edit', $data->id)}} " class="btn btn-primary " role="button" aria-pressed="true">EDIT</a>
                                    @if($confirming===$data->id)
                                    <button wire:click="kill({{ $data->id }})" type="button" class="btn btn-danger">Sure?</button>
                                    @else
                                    <button wire:click="confirmDelete({{ $data->id }})" type="button" class="btn btn-warning">Delete</button>
                                    @endif

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