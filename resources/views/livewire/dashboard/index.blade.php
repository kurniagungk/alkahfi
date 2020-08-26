<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                    <div class="card-body pb-0">
                        <button class="btn btn-transparent p-0 float-right" type="button">
                            <svg class="c-icon">
                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                        </button>
                        <div class="text-value-lg">{{$data['totalSantri']}}</div>
                        <div>Total Santri</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <button class="btn btn-transparent p-0 float-right" type="button">
                            <svg class="c-icon">
                                <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-transfer"></use>
                            </svg>
                        </button>
                        <div class="text-value-lg">{{$data['totalTransaksi']}}</div>
                        <div>Transaksi Pembayaran Hari Ini</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart2" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <div class="btn-group float-right">
                            <button class="btn btn-transparent p-0 float-right" type="button">
                                <svg class="c-icon">
                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user-follow"></use>
                                </svg>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                        </div>
                        <div class="text-value-lg">Rp. {{$data['totalPembayaran']}}</div>
                        <div>Pendapatan hari ini</div>
                    </div>
                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                        <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <div class="btn-group float-right">
                            <button class="btn btn-transparent p-0 float-right" type="button">
                                <svg class="c-icon">
                                    <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-bell"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="text-value-lg">Rp. {{$data['totalTunggakan']}}</div>
                        <div>Total Tunggakan Syahriah</div>
                    </div>
                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                        <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->

        <!-- /.card-->


        <!-- /.row-->
    </div>
</div>