<div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i>Nama Tagihan Periode</div>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{route('tagihan.create')}}" role="button">Tambah</a>
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
                    <th>MAP</th>
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
                    <td>{{$data->map}}</td>
                    <td>{{$data->nama}}</td>
                    <td>{{$data->tipe}}</td>
                    <td>{{$data->tahun->nama}}</td>
                    <td>
                        @if(!is_null($data->sekolah_id))
                        <a href="{{route('tagihan.edit', $data->id)}}" class="btn btn-outline-warning">edit</a>
                        <button wire:click="destroy({{$data->id}})" class="btn btn-outline-danger" type="button">
                            Hapus
                        </button>
                        @else
                        <a href="{{route('tagihan.tampil', $data->id)}}" class="btn btn-outline-warning">setting</a>
                        <span class="badge badge-danger">admin</span>
                        @endif
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        {{$DaftarTagihan->links()}}
    </div>
</div>