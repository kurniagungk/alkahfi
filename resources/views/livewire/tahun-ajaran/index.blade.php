<div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Simple Table</div>
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
                    <th>Semester</th>
                    <th>Awal</th>
                    <th>Akhir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tahun as $data)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->semester}}</td>
                    <td>{{$data->awal}}</td>
                    <td>{{$data->akhir}}</td>
                    <td>
                        <button wire:click="edit({{$data->id_tahun}})" class="btn btn-outline-warning">edit</button>
                        <button wire:click="destroy({{$data->id_tahun}})" class="btn btn-outline-danger" type="button">Hapus</button>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        {{$tahun->links()}}
    </div>
</div>
