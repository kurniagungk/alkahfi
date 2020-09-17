<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <!-- <font size="4">YAYASAN RUBATH AL-KAHFI</font><BR> -->
                        <font size="4"><b>YAYASAN RUBATH AL-KAHFI SOMALANGU</b></font><br>
                        <font><i>Sekretariat : Ds. Sumberadi Po Box.32 Kebumen 54351 Telp. (0287) 3870814</i></font>
                    </center>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <br>
                    <div class="col-sm-12">

                        <div class="col-sm-12">

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label><b>Cek Tunggakan</b></label>
                                </div>
                                <div class="col-md-12">
                                    <font> </font>
                                </div>
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



        <div class="col-sm-12">

        </div>


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

    </div>
</div>










@push('scripts')
<script type="text/javascript">
    window.livewire.on('download', () => {
        window.open("{{asset('public/'.'pdf/invoice.pdf')   }}", '_blank');
    })
</script>
@endpush