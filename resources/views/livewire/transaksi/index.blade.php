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



<div class="container-fluid">
    <!-- <div class="fade-in"> -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tagihan Bulanan</h5>
                </div>

                <div class="box box-warning box-solid">

                    <div class="box-body" style="display: block;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tahun Ajaran</th>

                                    <th>Jenis Pembayaran</th>
                                    <th>Total Tagihan</th>
                                    <th>Tunggakan Perbulan ini</th>
                                    <th>DiBayar</th>
                                    <th>Status Bayar</th>
                                    <th>
                                        <center>Bayar</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr style="color:green">
                                    <td>1</td>
                                    <td>2020 / 2021</td>

                                    <td>Syahriyah</td>
                                    <td>500.000</td>
                                    <td>300.000</td>
                                    <td>200.000</td>
                                    <td>

                                        <span class="badge badge-warning">Kurang</span>


                                    </td>
                                    <td width="125" style="text-align:center">
                                        <a class="btn btn-ghost-warning btn-sm" role="button" aria-pressed="true">EDIT</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <!-- </div> -->
</div>


<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tagihan Lainnya</h5>
                    </div>
                    <div class="box box-warning box-solid">
                        <div class="box-body" style="display: block;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tahun Ajaran</th>

                                        <th>Jenis Pembayaran</th>
                                        <th>Total Tagihan</th>
                                        <th>Tunggakan Perbulan ini</th>
                                        <th>DiBayar</th>
                                        <th>Status Bayar</th>
                                        <th>
                                            <center>Bayar</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr style="color:green">
                                        <td>1</td>
                                        <td>2020 / 2021</td>

                                        <td>Khaul</td>
                                        <td>125.000</td>
                                        <td>0</td>
                                        <td>125.000</td>
                                        <td>

                                            <span class="badge badge-success">Lunas</span>

                                        </td>
                                        <td width="125" style="text-align:center">
                                            <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
                                            <button class="btn btn-sm btn-danger" type="submit"> Cetak</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
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