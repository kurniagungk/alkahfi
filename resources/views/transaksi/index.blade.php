@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Transaksi</h4></div>
			<!-- /.box-header -->
			<div class="box-body">

			<div class="col-sm-6">
								<form method="GET" action="" class="form-horizontal">
					<input type="hidden" name="view" value="siswa">
					<table class="table-responsive">
						<tbody>
							<br>
							<tr>
							<div class="container-fluid">Pastikan data sudah benar sebelum di simpan ! </div>
							</tr>
                            <div class="form-group row">
                            <td class="col-sm-7">
                            <input class="form-control" type="text" placeholder="NIS / Nama . . .">
                            </td>
                            <td width="100">
									<input type="submit" name="tampil" value="Cari" class="btn btn-primary">
								</td>
                            </div>
						</tbody>
					</table>
				</form>
			</div>
            <br>
            <div class="col-sm-12">
            			<div class="box-header with-border">
				<!-- tools box -->
				
				<!-- /. tools -->
			  <h5 class="box-title">Informasi Siswa</h5>
			</div><!-- /.box-header -->
			<div class="box-body" style="display: block;">
				<table class="table-responsive">
					<tbody><tr>
						<td width="200">Tahun Ajaran</td><td width="4">:</td>
						<td><b>Semua Tahun Ajaran<b></td>
					</tr>
					<tr>
						<td>NIS</td><td>:</td>
						<td>373/046/110</td>
					</tr>
					<tr>
						<td>Nama Lengkap</td><td>:</td>
						<td>Amalia Ilmiah</td>
					</tr>
					<tr>
						<td>Sekolah - Kelas</td><td>:</td>
						<td>SMP - 7</td>
					</tr>
					<tr>
						<td>Asrama</td><td>:</td>
						<td>Abdul Kahfi</td>
                    </tr>
                    
                </tbody></table>
                <br>
			</div>
		</div>
        
			</div><!-- /.box-body -->
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
                <div class="card-header"><h5>Tagihan Bulanan</h5></div>
                
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
							<th>DiBayar</th>
							<th>Status Bayar</th>
							<th>Bayar</th>
						</tr>
					</thead>
					<tbody>
						<tr style="color:green">
								<td>1</td>
								<td>2019/2020</td>
								<td>Pondok</td>
								<td>Syahriah</td>
								<td>Rp 660.000</td>
								<td>Rp 500.000</td>
								<td><span class="badge badge-warning">Kurang</span></td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
							</tr>					</tbody>
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
                <div class="card-header"><h5>Tagihan Lainnya</h5></div>
                
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
							<th>DiBayar</th>
							<th>Status Bayar</th>
							<th>Bayar</th>
						</tr>
					</thead>
					<tbody>
						<tr style="color:green">
								<td>1</td>
								<td>2019/2020</td>
								<td>Pondok</td>
								<td>Khatmil</td>
								<td>Rp 660.000</td>
								<td>Rp 660.000</td>
								<td><span class="badge badge-success">Lunas</span></td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
                                </td>
                        </tr>
                    </tbody>
                    <tbody>
						<tr style="color:green">
								<td>1</td>
								<td>2019/2020</td>
								<td>Pondok</td>
								<td>Khatmil</td>
								<td>Rp 660.000</td>
								<td>Rp -</td>
								<td><span class="badge badge-danger">Belum Bayar</span></td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
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

@endsection

@section('javascript')

@endsection