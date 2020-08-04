<div class="fade-in">

    <div class="row">

        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    Laporan Harian
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <div class="col-12">

                        <div class="form-group row my-2">
                            <label class="col-md-3 col-form-label">Pilih Cetak</label>
                            <div class="col-md-9 col-form-label">
                                <div class="form-check form-check-inline mr-1">
                                    <input wire:model="select" class="form-check-input" id="inline-radio1" type="radio" value="1" name="inline-radios">
                                    <label class="form-check-label" for="inline-radio1">Semua</label>
                                </div>

                                <div class="form-check form-check-inline mr-1">
                                    <input wire:model="select" class="form-check-input" id="inline-radio3" type="radio" value="2" name="inline-radios">
                                    <label class="form-check-label" for="inline-radio3">Perjenis</label>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="col-12">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="date-input">Date Input</label>
                            <div class="col-4">
                                <input wire:model="tanggal.awal" class="form-control" type="date" name="date-input">
                            </div>
                            <div class="col-4">
                                <input wire:model="tanggal.ahir" class="form-control" type="date">
                            </div>
                        </div>

                    </div>

                    @if($select == 2)
                    <div class="col-12">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="select1">Jenis</label>
                            <div class="col-md-8">
                                <select wire:model="jenis" class="form-control" id="select1" name="select1">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    @endif
                    <div class="col-12 mb-2">

                        <button wire:click="click" class="btn btn-block btn-primary" type="button">Cetak</button>

                    </div>


                </div>
            </div>
        </div>

    </div>
</div>


@push('scripts')
<script type="text/javascript">
    window.livewire.on('download', () => {
        window.open("{{asset('public/'.'pdf/laporan-harian.pdf')   }}", '_blank');
    })
</script>
@endpush
