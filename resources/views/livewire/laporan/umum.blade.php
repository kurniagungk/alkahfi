<div class="container-fluid">
    <div class="fade-in">

        <div class="row">
            <div class="col-xl col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Jurnal Umum</h5>
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
                                                <div class="col-sm-1"></div>
                                                <div class="col-sm-4">
                                                    <input wire:model="akhir" type="date" class="form-control @error('akhir') is-invalid @enderror" id="inputPassword2">
                                                    @error('akhir')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>


                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Jenis Bayar</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input wire:model="periode" type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input @error('periode') is-invalid @enderror" value="0">
                                                        <label class="custom-control-label" for="customRadioInline1">Semua</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input wire:model="periode" type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input @error('periode') is-invalid @enderror" value="1">
                                                        <label class="custom-control-label" for="customRadioInline2">Bulanan</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input wire:model="periode" type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input @error('periode') is-invalid @enderror" value="2">
                                                        <label class="custom-control-label" for="customRadioInline3">Cicilan</label>
                                                    </div>
                                                    @error('periode')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror

                                                </div>

                                            </div>

                                            @if($periode)

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Nama Tagihan</label>
                                                <div class="col-sm-9">
                                                    <select wire:model="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                                        <option value=""> pilih salah satu </option>
                                                        @foreach($dataJenis as $j)
                                                        <option value="{{$j->id}}"> {{$j->nama}} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('jenis')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Sekolah</label>
                                                <div class="col-sm-9">
                                                    <select wire:model="sekolah" class="form-control @error('sekolah') is-invalid @enderror">
                                                        <option value=""> pilih salah satu </option>
                                                        @foreach($dataSekolah as $s)
                                                        <option value="{{$s->id}}"> {{$s->nama}} </option>
                                                        @endforeach
                                                    </select>
                                                    @error('sekolah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>

                                            </div>

                                            @endif

                                            <center>
                                                <button wire:click="data" class="btn btn-info btn-icon-split" type="button">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-filter"></i>
                                                    </span>
                                                    <span class="text">Filter</span>
                                                </button>
                                            </center>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-5 col-form-label">Periode : </label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-7 col-form-label">Nama Tagihan : </label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-7 col-form-label">Siswa Bayar : </label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-7 col-form-label">Total Pemasukan : </label>
                                        </div>
                                        <form>
                                            <center>
                                                <button wire:click="export" class="btn btn-warning btn-icon-split" type="button">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-download"></i>
                                                    </span>
                                                    <span class="text">Export</span>
                                                </button>
                                            </center>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Sekolah</th>
                                        <th>Jenis Bayar</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($dataTransaksi)
                                    @forelse ($dataTransaksi as $dt)
                                    <tr>
                                        <td>{{substr($dt->id, 0, 8)}}</td>
                                        <td>{{$dt->created_at}}</td>
                                        <td>{{$dt->santri->nis}}</td>
                                        <td>{{$dt->santri->nama}}</td>
                                        <td>{{$dt->santri->nama_sekolah}}</td>
                                        <td>{{$dt->jenis_tagihan->nama}}</td>
                                        <td>{{$dt->jumlah}}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Data</td>
                                    </tr>
                                    @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        window.livewire.on('download', () => {
            window.open("{{asset('public/'.'pdf/laporan-umum.pdf') }}", '_blank');
        })
    })
</script>
@endpush
