<div class="container-fluid">
    <div class="fade-in">

        <div class="row">
            <div class="col-xl col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Laporan asd</h5>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Export File :</div>
                                <a class="dropdown-item" href="#">PDF</a>
                                <a class="dropdown-item" href="#">Excell</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-8">
                                    <div class="card-body">

                                        <!-- <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" autocomplete="off" placeholder="Periode . . .">
                                </div> -->




                                        <div wire:ignore class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jenis Tagihan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="select2" multiple="multiple">
                                                    @forelse ($datatagihan as $t)
                                                    <option value="{{$t->id}}">{{$t->nama}}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>



                                        <center>
                                            <!--
                                            <button wire:click.prefetch="datat" class="btn btn-info btn-icon-split" type="button">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-filter"></i>
                                                </span>
                                                <div wire:loading wire:target="datat">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                </div>
                                                <span class="text">Filter</span>
                                            </button>
                                            -->
                                            <button wire:click.prefetch="export" class="btn btn-warning btn-icon-split" type="button">
                                                <div wire:loading wire:target="export">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                </div>
                                                <span class="text">Export</span>
                                            </button>
                                        </center>

                                    </div>
                                </div>
                            </div>



                        </div>
                        @if(!empty($data))
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th height="25" colspan="{{count($jenistagihan) + 4}}">Laporan harian</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Tanggal</th>
                                        <th>{{date("d-m-Y")}}</th>
                                    </tr>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA</th>
                                        <th>KELAS</th>
                                        @foreach($jenistagihan as $t)
                                        <th>{{$t->nama}}</th>
                                        @endforeach
                                        <th>jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach($data as $d)
                                    @php
                                    $jumlah = 0;
                                    @endphp
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$d['nama']}}</td>
                                        <td>{{$d['kelas']}}</td>
                                        @foreach ($d['tagihan'] as $dt)
                                        <td>{{$dt['jumlah'] - $dt['bayar'] }}</td>
                                        @php
                                        $jumlah += $dt['jumlah'] - $dt['bayar'] ;
                                        $total += $dt['jumlah'] - $dt['bayar'] ;
                                        @endphp
                                        @endforeach
                                        <td>{{$jumlah}}</td>
                                    </tr>
                                    @endforeach
                                    <tr>

                                        <td colspan="3">jumlah</td>
                                        @foreach($jenistagihan as $t)
                                        <th>{{$t->tagihan->sum('jumlah')}}</th>
                                        @endforeach
                                        <td>{{$total}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('css')
<link href="{{ asset('css/backand.css') }}" rel="stylesheet">
@endsection


@push('scripts')

<script src="{{ asset('js/backand.js') }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        $('#select2').select2({
            placeholder: "Semua Tagihan"
        });
        $('#select2').on('change', function(e) {
            var data = $('#select2').select2("val");
            @this.select = data

        });
    })
</script>

@endpush
