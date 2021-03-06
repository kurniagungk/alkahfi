<div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Data Tahun Ajaran</div>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('tahun.create')}}" role="button">Tambah</a>
        </div>

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
                    <th>Awal</th>
                    <th>Akhir</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahun as $data)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->awal}}</td>
                    <td>{{$data->akhir}}</td>
                    <td>
                        <span class="badge {{$data->status == 'aktif' ? 'badge badge-success' : 'badge badge-danger'}}">{{$data->status}}</span>
                    </td>
                    <td>
                        <a href="{{route('tahun.edit', $data->id)}}" class="btn btn-outline-warning">edit</a>
                        @role('admin')
                        @if($confirming===$data->id)
                        <button wire:click="kill({{ $data->id }})" type="button" class="btn btn-danger">Sure?</button>
                        @else
                        <button wire:click="confirmDelete({{ $data->id }})" type="button" class="btn btn-warning">Delete</button>
                        @endif
                        @endrole
                        <button wire:click="status({{$data->id}})" wire:click="destroy({{$data->id}})" class="btn btn-outline-primary" type="button">
                            aktif
                        </button>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        {{$tahun->links()}}
    </div>
</div>
