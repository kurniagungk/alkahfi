<div class="card">
    <div class="card-header"><i class="fa fa-align-justify"></i> Simple Table</div>
    <div class="card-body">
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
                        <span class="badge badge-warning">edit</span>
                        <span class="badge badge-danger">hapus</span>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </div>
</div>
