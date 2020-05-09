<div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Simple Table</div>
    <div class="card-body">
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
                    <th>Jenis</th>
                    <th>Tahun</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DaftarTagihan as $data)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->id_jenis}}</td>
                    <td>{{$data->id_tahun}}</td>
                    <td>
                        <button wire:click="edit({{$data->id_tagihan}})" class="btn btn-outline-warning">edit</button>
                        <button wire:click="destroy({{$data->id_tagihan}})" class="btn btn-outline-danger" type="button">Hapus</button>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        {{$DaftarTagihan->links()}}
    </div>
</div>
