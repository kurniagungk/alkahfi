<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">


            <div class="card">
                <div class="card-header"><strong>Tambah</strong> Nama Tagihan</div>
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif



                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Nama Kartu</label>
                        <div class="col-md-9">
                            <input wire:model="nama" class="form-control" id="text-input" type="text" name="text-input"
                                placeholder=". . . ">
                            @error('nama') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Tahun ajaran</label>
                        <div class="col-md-9">
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                            @error('nama') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input">Tahun ajaran</label>
                        <div class="col-md-9">
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                            @error('nama') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="flex row">
                        <label class="col-md-3 col-form-label">Tagihan</label>
                        <div class="col-md-9 flex row">
                            <div class=" mr-1 col-md-3 input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Jenis</div>
                                </div>
                                <select name="" id="" class="form-control">
                                    <option selected disabled></option>
                                    <option value="1">Bulanan</option>
                                    <option value="2">Cicilan</option>
                                </select>
                            </div>
                            <div class=" mr-1 col-md-3 input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Daftar</div>
                                </div>
                                <select name="" id="" class="form-control">
                                    <option value="1">Bulanan</option>
                                    <option value="2">Cicilan</option>
                                </select>
                            </div>
                            <div class=" mr-1 col-md-3 input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Bulan</div>
                                </div>
                                <input type="number" min="1" max="12" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            @error('periode') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="flex row mt-5 p-5">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">jenis</th>
                                    <th scope="col">tagihan</th>
                                    <th scope="col">lunas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>







                </div>
                <div class="card-footer">
                    <button wire:click="store" class=" btn btn-sm btn-primary" type="submit">
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