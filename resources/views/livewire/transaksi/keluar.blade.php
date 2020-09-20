<div class="card">
    <div class="card-header"><strong>Tambah</strong> Pengeluaran</div>
    <div class="card-body">

        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Nama Pengeluaran</label>
            <div class="col-md-9">
                <input wire:model="nama" class="form-control" id="text-input" type="text" name="text-input" placeholder=". . . ">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="select1">Sumber Dana</label>
            <div class="col-md-9">
                <select class="form-control" id="select1" wire:model="tahun">
                    <option value="">- Pilih -</option>
                    <option value="">MAP 1</option>
                    <option value="">MAP 2</option>
                    <option value="">MAP 3</option>
                </select>
                <span class="error"></span>
            </div>
        </div>

        <div class="form-group row">

            <div class="input-group">
                <label class="col-md-3 col-form-label" for="text-input">Jumlah</label>
                <div class="col-md-9 input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                    <input wire:model="nama" class="form-control" id="text-input" type="text" name="text-input">
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Keterangan</label>
            <div class="col-md-9">
                <textarea wire:model="alamat" class="form-control" id="textarea-input" name="alamat" rows="3" placeholder=""></textarea>
            </div>
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