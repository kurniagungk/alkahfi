<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h4>Data Santri</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="form-row align-items-center pb-2">
                        <div class="col-sm-4 my-1 mb-2 ">
                            <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="c-icon cil-search"></i>
                                    </div>
                                </div>
                                <input wire:model="search" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Cari">
                            </div>
                        </div>


                        <div class="col-sm-4 my-1 mx-3">

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
                    </div>
                    @if(!empty($santri))
                    <table id="TabelSantri" class="table table-responsive-sm pt-2" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>NISM</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>JK</th>
                                <th>
                                    <center>
                                        <div class="form-check">
                                            <input wire:model="all" value="1" type="checkbox" class="form-check-input" id="selectall">
                                            <label class="form-check-label" for="exampleCheck1">Semua</label>
                                        </div>
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($santri as $s)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$s->nism}}</td>
                                <td>{{$s->nisn}}</td>
                                <td>{{$s->nama}}</td>
                                <td>{{$s->jenis_kelamin}}</td>
                                <td>{{$s->kelas->tingkat}} - {{$s->kelas->kelas}}</td>
                                <td>
                                    <center>
                                        <div class="form-check">
                                            <input value="{{$s->id}}" name="all" type="checkbox" class="form-check-input all" wire:model="select">
                                        </div>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h4>Pilih Kelas</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">

                    <div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>


                    @error('select')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group row mb-2">
                        <label for="staticEmail" class="col-sm-4 col-form-label">pilih kelas</label>
                        <div class="col-sm-8">
                            <select wire:model="naik" class="form-control @error('naik') is-invalid @enderror" name="status">
                                <option value="0" selected>- pilih kelas -</option>
                                @foreach($kelas as $k)
                                <option value="{{$k->id}}">{{$k->tingkat}} - {{$k->kelas}}</option>
                                @endforeach
                            </select>
                            @error('naik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col text-center">
                            <button wire:click="naikKelas" class="btn btn btn-primary">Naik Kelas</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    Livewire.on('all', () => {
        let id = [];
        $('input[name="all"]').each(function() {
            id.push($(this).val())
            this.checked = true;
        });
        @this.select = id;
    })
    Livewire.on('del', () => {
        let id = [];
        $('input[name="all"]').each(function() {
            this.checked = false;
        });
        @this.select = id;
    })
</script>
@endpush