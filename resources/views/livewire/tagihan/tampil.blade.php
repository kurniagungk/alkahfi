<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>Rincian Jenis Tagihan</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <p>Nama</p>
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6">
                                <p>{{$jenisTagihan->nama}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Jenis</p>
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6">
                                <p>{{$jenisTagihan->tipe}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <p>Tahun Ajaran</p>
                            </div>
                            <div class="col-md-1">:</div>
                            <div class="col-md-6">
                                <p>{{$jenisTagihan->Tahun->nama}}</p>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>Rincian Jenis Tagihan</div>
                    <div class="card-body">

                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif

                        <div class="form-row align-items-center">
                            <div class="col-sm-3 my-3 ">
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

                            <div class="col-sm-3 my-1 mx-1">
                                <label class="sr-only">Username</label>
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
                                    </select>



                                </div>
                            </div>

                            <div class="col-sm-3 my-1 mx-3">
                                <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            Kelas
                                        </div>
                                    </div>
                                    <select wire:model="selectKelas" class="form-control" name="status">
                                        <option value="0" selected>- pilih kelas -</option>
                                        @foreach($kelas as $k)
                                        <option value="{{$k->id}}">{{$k->tingkat}} - {{$k->kelas}}</option>
                                        @endforeach
                                    </select>



                                </div>
                            </div>

                            <div class="col-sm-2">
                                @if(!empty($select))
                                @if(!$hapus)
                                <button wire:click='hapusPilihan' type="button" class="btn btn-warning">Hapus Pilihan</button>
                                @else
                                <button wire:click='hapus' type="button" class="btn btn-danger">yakin ?</button>
                                @endif
                                @endif
                            </div>



                        </div>


                        <table class="table table-responsive-sm">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>kelas</th>
                                    <th>Jatuh Tempo</th>
                                    <th>biaya</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($santri as $s)
                                <tr>
                                    <td>
                                        <div class="form-group form-check">
                                            <input wire:model='select' value="{{$s->id}}" type="checkbox" class="form-check-input" wire:key="{{ $loop->index }}">
                                        </div>
                                    </td>
                                    <td>{{$loop->index +1}}</td>
                                    <td>{{$s->santri->nisn}}</td>
                                    <td>{{$s->santri->nama}}</td>
                                    <td>{{$s->kelas->tingkat}} - {{$s->kelas->kelas}}</td>
                                    <td>{{$s->tempo}}</td>
                                    <td>{{$s->jumlah}}</td>
                                    <td>
                                        <center>
                                            @if($confirming == $s->id)
                                            <button wire:click=" kill('{{ $s->id }}')" type="button" class="btn btn-danger">Sure?</button>
                                            @else
                                            <button wire:click="confirmDelete( '{{ $s->id }}' )" type="button" class="btn btn-warning">Delete</button>
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
            </div>
        </div>
    </div>
</div>