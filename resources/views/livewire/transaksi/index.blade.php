<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Transaksi</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="col-sm-12">

                        <div class="col-sm-12">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input wire:model="nis" class="form-control" id="input2-group2" name="id" placeholder="MASUKAN NOMER INDUK SISWA / SANTRI"><span class="input-group-append">
                                            <button wire:click="find" class="btn btn-primary" type="submit">Submit</button></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>



        @if($find)
        <div class="col-sm-12">
            @livewire('transaksi.profil', ['id' => $nis] )
        </div>

        @livewire('transaksi.detail', ['id' => $nis])

        @else

        @if($data)
        <div class="col-sm-12">
            <div class="card">

                <!-- /.box-header -->
                <div class="box-body">
                    <br>

                    <div class="col-sm-12">
                        <div class="text-center">
                            <h1>Data Not found</h1>
                        </div>
                        <br>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        @endif
        @endif
    </div>
</div>








@push('scripts')
<script type="text/javascript">
    window.livewire.on('download', () => {
        window.open("{{asset('public/'.'pdf/invoice.pdf')   }}", '_blank');
    })
</script>
@endpush
