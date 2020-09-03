<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>Data Sekolah</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <a class="btn btn-primary" href="{{route('user.create')}}" role="button">Tambah</a>
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $s)
                                <tr>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$s->name}}</td>
                                    <td>{{$s->email}}</td>
                                    <td>
                                        @foreach($s->roles as $r)
                                        {{$r->name}}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit', $s->id)}}" class="btn btn-outline-warning">edit</a>
                                        @if($confirming===$s->id)
                                        <button wire:click="kill({{ $s->id }})" type="button" class="btn btn-danger">Sure?</button>
                                        @else
                                        <button wire:click="confirmDelete({{ $s->id }})" type="button" class="btn btn-warning">Delete</button>
                                        @endif
                                    </td>
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