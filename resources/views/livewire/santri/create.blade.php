<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Input</strong> Data Santri</div>
                    <div class="card-body">

                        <form class="form-horizontal" wire:submit.prevent="store" enctype="multipart/form-data">

                            <!-- <div class="form-group row">
                                  <label class="col-md-3 col-form-label">Static</label>
                                  <div class="col-md-9">
                                      <p class="form-control-static">Username</p>
                                  </div>
                              </div> -->
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">NIS</label>
                                <div class="col-md-9">
                                    <input wire:model="no_induk" class="form-control @error('no_induk') is-invalid @enderror" id="no_induk" type="text" name="no_induk" placeholder="Nomor Induk Pondok . . .">

                                    @error('no_induk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <input wire:model="nama" class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" placeholder=". . ."><span class="help-block">* Sesuai ijazah</span>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="date-input">tempat Lahir</label>
                                <div class="col-md-9">
                                    <input wire:model="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" id="text-input" name="tempat_lahir" placeholder="date">
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="date-input">Tanggal Lahir</label>
                                <div class="col-md-9">
                                    <input wire:model="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" id="date-input" type="date" name="tgl_lahir" placeholder="date">
                                    @error('tgl_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="textarea-input">Alamat</label>
                                <div class="col-md-9">
                                    <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror" id="textarea-input" name="alamat" rows="5" placeholder="Isi Sesuai KK . . ."></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Lembaga</label>
                                <div class="col-md-9">
                                    <select wire:model="sekolah" class="custom-select @error('sekolah') is-invalid @enderror" id="select1" name="sekolah">
                                        <option value="0">- Pilih Lembaga -</option>
                                        <option value="1">Pondok</option>
                                        <option value="2">SMK</option>
                                        <option value="3">SMA</option>
                                        <option value="3">SMP</option>
                                    </select>
                                    @error('sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Sub lembaga</label>
                                <div class="col-md-9">
                                    <select wire:model="asrama" class="custom-select @error('asrama') is-invalid @enderror" id="select1" name="asrama">
                                        <option value="0" selected>- Pilih Sub Lembaga -</option>
                                        @foreach($DataAsrama as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('asrama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9 col-form-label">
                                    <div class="form-check form-check-inline mr-1">
                                        <input wire:model="jenis_kelamin" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" id="inline-radio1" type="radio" value="1" name="jenis_kelamin">
                                        <label class="form-check-label" for="inline-radio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-1">
                                        <input wire:model="jenis_kelamin" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" id="inline-radio2" type="radio" value="2" name="jenis_kelamin">
                                        <label class="form-check-label" for="inline-radio2">Perempuan</label>
                                    </div>
                                    @error('jenis_kelamin')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Tahun Masuk</label>
                                <div class="col-md-9">
                                    <select wire:model="id_tahun" class="custom-select @error('id_tahun') is-invalid @enderror" id="ccyear" name="id_tahun" width="100">
                                        <option value="0">- Pilih Tahun Ajaran -</option>
                                        @foreach($DataTahun as $data)
                                        <option value="{{$data->id_tahun}}">{{$data->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Orang Tua / Wali</label>
                                <div class="col-md-9">
                                    <input wire:model="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" id="text-input" type="text" name="nama_wali" placeholder="Ex. Ahmad . . .">
                                    @error('nama_wali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">No Telp / Hp</label>
                                <div class="col-md-9">
                                    <input wire:model="telepon" class="form-control @error('telepon') is-invalid @enderror" id="text-input" type="text" name="telepon" placeholder="08128888xxxx">
                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="file-input">Pas Foto</label>
                                <div class="col-md-9">
                                    <input wire:model="photo" type="file" name="foto" class="form-control-file @error('photo') is-invalid @enderror"><span class="help-block">* Ukuran (3x4) Format .jpg</span>
                                    <br>
                                    @if ($photo)

                                    <img src="{{ $photo->temporaryUrl() }}" height="200px" width="200px" class="img-thumbnail" alt="...">
                                    @endif

                                    @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                            </div>


                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-success" type="submit"> Simpan</button>
                        <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                        </form>
                    </div>
                </div>

            </div>

            <!-- /.col-->
        </div>
    </div>

</div>
