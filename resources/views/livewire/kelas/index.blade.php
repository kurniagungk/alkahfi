<div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Data Kelas</div>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('kelas.create')}}" role="button">Tambah</a>
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
                    <th>Tingkat</th>
                    <th>Kelas</th>
                    <th>Keterangan</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $data)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->tingkat}}</td>
                    <td>{{$data->kelas}}</td>
                    <td>{{$data->keterangan}}</td>
                    <td>
                        <center>
                            <a href="{{route('kelas.edit', $data->id)}}" class="btn btn-outline-warning">edit</a>
                            @if($confirming===$data->id)
                            <button wire:click="kill({{ $data->id }})" type="button" class="btn btn-danger">Sure?</button>
                            @else
                            <button wire:click="confirmDelete({{ $data->id }})" type="button" class="btn btn-warning">Delete</button>
                            @endif
                        </center>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        {{$kelas->links()}}
    </div>
</div>