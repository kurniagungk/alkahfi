<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header"><strong>Tambah</strong> Pengeluaran</div>
                <div class="card-body">

                    @if (session()->has('message'))
                    {!! session('message')!!}
                    @endif

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Pengeluaran</label>
                        <div class="col-md-9">
                            <input wire:model="nama" class="form-control  @error('nama') is-invalid @enderror" id="text-input" type="text" name="text-input" placeholder=". . . ">
                            @error('nama') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="select1">Sumber Dana</label>
                        <div class="col-md-9">
                            <select class="form-control  @error('jenisTagihan') is-invalid @enderror" wire:model="jenisTagihan">
                                <option value="">- Pilih -</option>
                                @foreach($jenis as $j)
                                <option value="{{$j->id}}">{{$j->map}} - {{$j->nama}}</option>
                                @endforeach
                            </select>
                            @error('jenisTagihan') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>



                    <div class="input-group mb-3">
                        <label class="col-md-3 col-form-label" for="text-input">Jumlah</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input wire:model="jumlah" class="form-control  @error('jumlah') is-invalid @enderror" type="number" name="text-input">
                        @error('jumlah') <span class="error">{{ $message }}</span> @enderror
                    </div>


                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Keterangan</label>
                        <div class="col-md-9">
                            <textarea wire:model="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" id="textarea-input" name="alamat" rows="3" placeholder=""></textarea>
                            @error('keterangan') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button wire:click="save" class=" btn btn-sm btn-primary" type="submit">
                        <div wire:loading wire:target="store">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </div>
                        Submit
                    </button>
                    <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                </div>

            </div>
        </div>
    </div>
</div>
