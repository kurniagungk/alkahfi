<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Input</strong> Data Santri</div>
                    <div class="card-body">

                        <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">NISM</label>
                                <div class="col-md-9">
                                    <input wire:model="nisn" class="form-control @error('nisn') is-invalid @enderror" id="no_induk" type="text" placeholder="Nomor Induk Siswa Nasional . . .">

                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="">NISM</label>
                                <div class="col-md-9">
                                    <input wire:model="nism" class="form-control @error('nism') is-invalid @enderror" id="no_induk" type="text" placeholder="Nomor Induk santri Madrasah  . . .">

                                    @error('nism')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="">Nama Lengkap</label>
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
                                    <input wire:model="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" placeholder="date">
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
                                    <input wire:model="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="date-input" type="date" name="tanggal_lahir" placeholder="date">
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Alamat</label>
                                <div class="col-md-9">
                                    <select wire:model="provinsi" class="custom-select @error('provinsi') is-invalid @enderror" id="provinsi">
                                        <option value="">- Provinsi -</option>
                                        @foreach($dataProvinsi as $prov)
                                        <option value="{{$prov->kode}}">{{$prov->nama}}</option>
                                        @endforeach

                                    </select>
                                    @error('provinsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @if($provinsi)
                                    <br>
                                    <br>
                                    <select wire:model="kabupaten" class="custom-select @error('kabupaten') is-invalid @enderror" id="kabupaten">
                                        <option value="">- Kota / Kabupaten -</option>
                                        @foreach ($dataKabupaten as $kab)
                                        <option value="{{$kab->kode}}">{{$kab->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('kabupaten')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @endif
                                    @if($kabupaten)
                                    <br>
                                    <br>
                                    <select wire:model="kecamatan" class="custom-select @error('kecamatan') is-invalid @enderror">
                                        <option value="">- Kecamatan -</option>
                                        @foreach ($dataKecamatan as $kec)
                                        <option value="{{$kec->kode}}">{{$kec->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('kecamatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @endif
                                    @if($kecamatan)
                                    <br>
                                    <br>
                                    <select wire:model="desa" class="custom-select @error('desa') is-invalid @enderror">
                                        <option value="">- Desa / Kelurahan -</option>
                                        @foreach ($dataDesa as $des)
                                        <option value="{{$des->kode}}">{{$des->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('desa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @endif
                                    @if($desa)
                                    <br>
                                    <br>
                                    <textarea wire:model="alamat" class="form-control @error('alamat') is-invalid @enderror" id="textarea-input" name="alamat" rows="3" placeholder=""></textarea>
                                    @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">Sekolah</label>
                                <div class="col-md-9">
                                    <select wire:model="sekolah" class="custom-select @error('sekolah') is-invalid @enderror" id="select1" name="sekolah">
                                        <option value="0">- Pilih Sekolah -</option>
                                        @foreach($DataSekolah as $data)
                                        <option value="{{$data->id}}">{{$data->nama}}</option>
                                        @endforeach
                                    </select>
                                    @error('sekolah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            @if($sekolah > 1)

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="kelas">Kelas</label>
                                <div class="col-md-9">
                                    <select wire:model="kelas" class="custom-select @error('kelas') is-invalid @enderror">
                                        <option value="0">- Pilih Kelas -</option>
                                        @foreach($DataKelas as $datak)
                                        <option value="{{$datak->id}}">{{$datak->tingkat . ' '. $datak->kelas}}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            @endif


                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select1">asrama</label>
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
                                        <input wire:model="jenis_kelamin" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" id="inline-radio1" type="radio" value="Laki-Laki" name="jenis_kelamin">
                                        <label class="form-check-label" for="inline-radio1">Laki-laki</label>
                                    </div>
                                    <div class="form-check form-check-inline mr-1">
                                        <input wire:model="jenis_kelamin" class="form-check-input @error('jenis_kelamin') is-invalid @enderror" id="inline-radio2" type="radio" value="Perempuan" name="jenis_kelamin">
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
                                    <input wire:model="tahun" class="form-control @error('tahun') is-invalid @enderror" type="date" placeholder="date">
                                    @error('tahun')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Orang Tua / Wali</label>
                                <div class="col-md-9">
                                    <input wire:model="wali" class="form-control @error('wali') is-invalid @enderror" type="text" name="nama_wali" placeholder="Ex. Ahmad . . .">
                                    @error('wali')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">No Telp / Hp</label>
                                <div class="col-md-9">
                                    <input wire:model="telepon" class="form-control @error('telepon') is-invalid @enderror" type="text" name="telepon" placeholder="08128888xxxx">
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
                                    <input wire:model="NewPhoto" type="file" name="foto" class="form-control-file @error('NewPhoto') is-invalid @enderror"><span class="help-block">* Ukuran (3x4) Format .jpg</span>
                                    <br>
                                    @if ($NewPhoto)
                                    @if(!$errors->has('NewPhoto'))
                                    <img src="{{ $NewPhoto->temporaryUrl() }}" height="200px" width="200px" class="img-thumbnail" alt="...">
                                    @endif


                                    @else


                                    <img src="{{asset('public/'.$photo)   }}" height="200px" width="200px" class="img-thumbnail" alt="...">
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
