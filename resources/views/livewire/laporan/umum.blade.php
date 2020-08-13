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


                                        <form class="form-inline">
                                            <div class="form-group mb-2">
                                                <label class="sr-only">Email</label>
                                                <input type="text" class="form-control-plaintext" value="Periode">
                                            </div>
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label class="sr-only">Password</label>
                                                <input type="date" class="form-control" id="inputPassword2" placeholder="Awal">
                                            </div>
                                            <div class="form-group mx-sm-3 mb-2">

                                                <label class="sr-only">Password</label>
                                                <input type="date" class="form-control" id="inputPassword2" placeholder="Ahir">
                                            </div>
                                        </form>

                                        <form class="form-inline">
                                            <div class="form-group mb-2">
                                                <label for="staticEmail2" class="sr-only">Jenis Bayar</label>
                                                <input type="text" readonly class="form-control-plaintext" value="Jenis Bayar">
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline1">Semua</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline2">Bulanan</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadioInline3">Tahunan</label>
                                            </div>
                                        </form>
                                        <form class="form-inline">
                                            <div class="form-group mb-2">
                                                <label for="staticEmail2" class="sr-only">Nama Tagihan</label>
                                                <input type="text" readonly class="form-control-plaintext" value="Nama Tagihan">
                                            </div>
                                            <div class="form-group col-md-8">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Semua </option>
                                                    <option>Koperasi</option>
                                                    <option>Warnet</option>
                                                </select>
                                            </div>
                                        </form>
                                        <form class="form-inline">
                                            <div class="form-group mb-2">
                                                <label for="staticEmail2" class="sr-only">Sekolah</label>
                                                <input type="text" readonly class="form-control-plaintext" value="Sekolah">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <select id="inputState" class="form-control">
                                                    <option selected>Semua </option>
                                                    <option>SMK</option>
                                                    <option>SMA</option>
                                                    <option>SMP</option>

                                                </select>
                                            </div>
                                        </form>
                                        <br>
                                        <form>
                                            <center>
                                                <a class="btn btn-info btn-icon-split" href="#">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-filter"></i>
                                                    </span>
                                                    <span class="text">Filter</span>
                                                </a>
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
                                                <a class="btn btn-warning btn-icon-split" href="#">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-download"></i>
                                                    </span>
                                                    <span class="text">Export</span>
                                                </a>
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
                                    <tr>
                                        <td>TR-0001</td>
                                        <td>12-11-2020 15.20</td>
                                        <td>NB-001</td>
                                        <td>Abdul</td>
                                        <td>SMK</td>
                                        <td>Syahriah</td>
                                        <td>50.000</td>
                                    </tr>
                                    <tr>
                                        <td>TR-0002</td>
                                        <td>12-11-2020 10:15</td>
                                        <td>NB-001</td>
                                        <td>Abdul</td>
                                        <td>SMK</td>
                                        <td>Khaul</td>
                                        <td>100.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>