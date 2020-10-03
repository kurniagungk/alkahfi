<div class="container-fluid">
    <div class="fade-in">

        <div class="row">
            <div class="col-xl col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Laporan Umum</h5>
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
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-1">
                                    <div class="card-body">

                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-4">
                                                    <input wire:model="awal" type="date" class="form-control @error('awal') is-invalid @enderror" id="inputPassword2">
                                                    @error('awal')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-4">
                                                    <input wire:model="akhir" type="date" class="form-control @error('akhir') is-invalid @enderror" id="inputPassword2">
                                                    @error('akhir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <center>
                                                <button wire:click="datat" class="btn btn-info btn-icon-split" type="button">
                                                    <div wire:loading wire:target="datat">
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    </div>
                                                    <span class="text">filter</span>
                                                </button>

                                                <button wire:click="export" class="btn btn-info btn-icon-split" type="button">
                                                    <div wire:loading wire:target="export">
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    </div>
                                                    <span class="text">Export</span>
                                                </button>
                                            </center>
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @if($data)
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow mb-1">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th height="25" colspan="{{count($tagihan) + 4}}">Laporan harian</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="3">Tanggal</th>
                                                        <th>{{$awal}}</th>
                                                        <th>-</th>
                                                        <th>{{$awal}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>NAMA</th>
                                                        <th>KELAS</th>
                                                        @foreach($tagihan as $t)
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
                                                    $sum = 0;
                                                    @endphp
                                                    <tr>
                                                        <td>{{$loop->index + 1}}</td>
                                                        <td>{{$d['nama']}}</td>
                                                        <td>{{$d['kelas']}}</td>
                                                        @foreach ($d['tagihan'] as $dt)
                                                        @php
                                                        $sum += $dt->sum('bayar');
                                                        $total += $dt->sum('bayar');
                                                        @endphp
                                                        <td>{{$dt->sum('bayar') ?? ''}}</td>
                                                        @endforeach
                                                        <td>{{$sum}}</td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3">jumlah</td>
                                                        @foreach($tagihan as $t)
                                                        <th>{{$t->tagihan->sum('bayar')}}</th>
                                                        @endforeach
                                                        <td>{{$total}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script type="text/javascript">
    window.livewire.on('download', () => {
        window.open("{{asset('public/'.'export/laporanharian.xlsx')   }}", '_blank');
    })
</script>
@endpush
