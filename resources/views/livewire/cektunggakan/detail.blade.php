<div>

    @if($detail)

    @if($jenis)


    @livewire('cektunggakan.bulanan', ['id' => $t, 'santri_id' => $santri_id], key('bulanan-'.$t))
    @else
    @livewire('cektunggakan.tahunan', ['id' => $t, 'santri_id' => $santri_id], key('tahunan-'.$t))
    @endif





    @else


    <div class="card">
        <div class="card-header">
            <h4>Tagihan Bulanan</h4>
        </div>
        <!-- /.box-header -->
        <div class="card-body">
            <br>


            <div class="table-responsive">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>
                                <p>Tagihan</p>
                            </th>
                            <th>
                                <p>Total Tunggakan</p>
                            </th>
                            <th>
                                <p>#</p>
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($TagihanBulanan as $data)

                        @continue($data->status == 0)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>
                                <p>{{$data->jenis->nama}}</p>
                            </td>
                            <td>
                                <p>{{FormatRupiah($data->total)}}</p>
                            </td>
                            <td>
                                <button wire:click="detail({{$data->jenis_tagihan_id}}, '{{$santri_id}}')" class="btn btn-success btn-sm">Detail</button>
                            </td>



                        </tr>

                        @endforeach
                    </tbody>

                </table>

            </div>
            <br>
        </div><!-- /.box -->

    </div>

    <div class="card">
        <div class="card-header">
            <h4>Tagihan Periode</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <br>
            <div class="col-sm-12">

                <div class="col-sm-12">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tagihan</th>
                                <th>Tolat Tagihan</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tagihanPeriode as $data)
                            @continue($data->total - $data->bayar_count == 0)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$data->jenis->nama}}</td>
                                <td>{{FormatRupiah($data->total - $data->bayar_count)}}</td>
                                <td>
                                    <button wire:click="periode('{{$data->id}}', '{{$data->jenis->nama}}')" class="btn btn-success btn-sm">Detail</button>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>

                </div>
                <br>

            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>

    @endif



</div>
