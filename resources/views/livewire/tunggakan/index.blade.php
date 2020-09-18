<div class="container-fluid">
    <div class="fade-in">

        <div class="row">
            <div class="col-xl col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">Laporan Tunggakan</h5>
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
                                                <label class="col-md-3 col-form-label">Periode Pembayaran</label>
                                                <div class="col-md-9">
                                                    <select class="form-control  @error('periode') is-invalid @enderror" wire:model="periode">
                                                        <option value=''>pilih salah satu</option>
                                                        <option value="spp">bulanan</option>
                                                        <option value="cicilan">Cicilan</option>
                                                    </select>
                                                    @error('periode')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if($periode)
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label">Jenis Pembayaran</label>
                                                <div class="col-md-9">

                                                    <select class="form-control @error('jenis') is-invalid @enderror" wire:model="jenis">
                                                        <option value=''>pilih salah satu</option>
                                                        @foreach ($dataJenis as $data)
                                                        <option value="{{$data->id}}">{{$data->nama}}</option>

                                                        @endforeach

                                                    </select>
                                                    @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

                            <div class="col-xl-4 col-lg-5 d-none">
                                <div class="card shadow mb-4">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-5 col-form-label">Periode : </label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-7 col-form-label">Nama Tagihan : </label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-7 col-form-label">Siswa Tertagih : </label>
                                        </div>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-7 col-form-label">Total Tagihan : </label>
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
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        @role('admin')
                                        <th>Sekolah</th>
                                        @endrole
                                        <th>Kelas</th>
                                        <th>Jumlah Tunggakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($dataTunggakan)
                                    @foreach ($dataTunggakan as $tunggakan)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$tunggakan->nisn }}</td>
                                        <td>{{$tunggakan->nama }}</td>
                                        @role('admin')
                                        <td>{{$tunggakan->sekolah->nama}}</td>
                                        @endrole
                                        <td>{{$tunggakan->kelas->tingkat }} - {{$tunggakan->kelas->kelas }}</td>
                                        <td>{{FormatRupiah($tunggakan->tagihan->sum('jumlah') - $tunggakan->tagihan->sum('bayar_count'))}} </td>
                                    </tr>

                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Data</td>
                                    </tr>
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
    window.livewire.on('download', () => {
        window.open("{{asset('public/'.'export/tunggakan.xlsx')   }}", '_blank');
    })
</script>
@endpush
