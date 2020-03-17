  @extends('dashboard.base')

  @section('content')




  <div class="container-fluid">
      <div class="fade-in">
          <div class="row">
              <div class="col-sm-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>Transaksi</h4>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" style="display: block;">
                          <table class="table-responsive">
                              <tbody>
                                  <tr>
                                      <td width="200">Tahun Ajaran</td>
                                      <td width="4">:</td>
                                      <td><b>Semua Tahun Ajaran<b></td>
                                  </tr>
                                  <tr>
                                      <td>NIS</td>
                                      <td>:</td>
                                      <td>373/046/110</td>
                                  </tr>
                                  <tr>
                                      <td>Nama Lengkap</td>
                                      <td>:</td>
                                      <td>Amalia Ilmiah</td>
                                  </tr>
                                  <tr>
                                      <td>Sekolah - Kelas</td>
                                      <td>:</td>
                                      <td>SMP - 7</td>
                                  </tr>
                                  <tr>
                                      <td>Asrama</td>
                                      <td>:</td>
                                      <td>Abdul Kahfi</td>
                                  </tr>

                              </tbody>
                          </table>
                          <br>
                      </div>
                  </div><!-- /.box -->
              </div>
          </div>
      </div>
  </div>


  <div class="container-fluid">
      <div class="fade-in">
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
                                          <th>Pos Bayar</th>
                                          <th>Jenis Pembayaran</th>
                                          <th>Total Tagihan</th>
                                          <th>Tunggakan Perbulan ini</th>
                                          <th>DiBayar</th>
                                          <th>Status Bayar</th>
                                          <th>Bayar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($bulanan as $tbulan)
                                      <tr style="color:green">
                                          <td>{{$loop->index +1}}</td>
                                          <td>{{$tbulan->jenis->id_tahun}}</td>
                                          <td>{{$tbulan->jenis->nama}}</td>
                                          <td>{{$tbulan->jenis->nama}}</td>
                                          <td>{{$tbulan->total}}</td>
                                          <td>{{$tbulan->tunggakan}}</td>
                                          <td>{{$tbulan->dibayar}}</td>
                                          <td>
                                              @if ($tbulan->status > 0)
                                              <span class="badge badge-warning">Kurang</span>
                                              @else
                                              <span class="badge badge-success">Lunas</span>
                                              @endif

                                          </td>
                                          <td width="40" style="text-align:center">
                                              <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                  </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
      </div>
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
                                          <th>Pos Bayar</th>
                                          <th>Jenis Pembayaran</th>
                                          <th>Total Tagihan</th>
                                          <th>Tunggakan Perbulan ini</th>
                                          <th>DiBayar</th>
                                          <th>Status Bayar</th>
                                          <th>Bayar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($periode as $tperiode)
                                      <tr style="color:green">
                                          <td>{{$loop->index +1}}</td>
                                          <td>{{$tperiode->jenis->id_tahun}}</td>
                                          <td>{{$tperiode->jenis->nama}}</td>
                                          <td>{{$tperiode->jenis->nama}}</td>
                                          <td>{{$tperiode->total}}</td>
                                          <td>{{$tperiode->tunggakan}}</td>
                                          <td>{{$tperiode->dibayar}}</td>
                                          <td>
                                              @if ($tperiode->status > 0)
                                              <span class="badge badge-warning">Kurang</span>
                                              @else
                                              <span class="badge badge-success">Lunas</span>
                                              @endif

                                          </td>
                                          <td width="40" style="text-align:center">
                                              <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
                                          </td>
                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>

                  </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>
      </div>
  </div>

  @endsection

  @section('javascript')

  @endsection
