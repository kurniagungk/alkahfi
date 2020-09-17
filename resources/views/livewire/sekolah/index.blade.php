<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>Data Sekolah</div>
                    <div class="card-body">
                        @role('admin')
                        <div class="mb-3">
                            <a class="btn btn-primary" href="{{route('sekolah.create')}}" role="button">Tambah</a>
                        </div>
                        @endrole

                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>logo</th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sekolah as $data)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->keterangan}}</td>
                                    <td>
                                        <img src="{{asset('public/'.$data->logo)   }}" width="50px" class="img-thumbnail" alt="...">
                                    </td>
                                    <td>
                                        <center>
                                            <a href="{{route('sekolah.edit', $data->id)}}" class="btn btn-outline-warning">edit</a>
                                            @role('admin')
                                            @if($confirming===$data->id)
                                            <button wire:click="kill({{ $data->id }})" type="button" class="btn btn-danger">Sure?</button>
                                            @else
                                            <button wire:click="confirmDelete({{ $data->id }})" type="button" class="btn btn-warning">Delete</button>
                                            @endif
                                            @endrole
                                        </center>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                        {{$sekolah->links()}}
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>
