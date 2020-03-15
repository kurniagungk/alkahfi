@extends('dashboard.base')

@section('content')

<!-- form header -->
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Pembayaran</strong> Tagihan</div>
                    <div class="card-body">
                    <div class="container-fluid">
    
        <section class="content">
        <div class="row">
            <div class="col-xs-4"> 
		<div class="box box-info box-solid">
			<div class="box-header with-border">
				<h4 class="box-title">Informasi Tagihan</h4>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table class="col-sm-12 col-md mb-sm-2 mb-0">
					<tbody><tr>
						<td>Jenis</td><td>:</td>
						<td>Khatmil Qur'an Arbain</td>
					</tr>
					<tr>
						<td>Tahun Ajaran</td><td>:</td>
						<td>2019/2020</td>
					</tr>
					<tr>
						<td>NIS</td><td>:</td>
						<td>379/052/110</td>
					</tr>
					<tr>
						<td>Nama Santri</td><td>:</td>
						<td>Agung Kurniawan</td>
                    </tr>
                    <tr>
						<td>Sekolah</td><td>:</td>
						<td>SMK</td>
                    </tr>
					<tr>
						<td>Kelas</td><td>:</td>
						<td>X OTKP</td>
                    </tr>
                    <tr>
						<td>Asrama</td><td>:</td>
						<td>Abdurrahman</td>
                    </tr>
					<tr class="warning">
						<td>Total Tagihan</td><td>:</td>
						<td><b>Rp 50.000</b></td>
					</tr>
                </tbody>
            </table>
			</div>
			<div class="box-footer">
				<a href="index.php?view=pembayaran&amp;idTahunAjaran=4&amp;siswa=305&amp;cari=Cari+Siswa" class="btn btn-primary pull-right"><span class="fa fa-reply"></span> Kembali</a>
            <br></br>
            </div>
		</div>
	</div>
	<div class="col-xs-8">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h4 class="box-title">Pembayaran Tagihan</h4>
			</div><!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Jumlah Bayar</th>
							<th>Opsi</th>
							<th>Keterangan</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<tr class="success">
							<td colspan="2"><b>Total Bayar</b></td>
							<td align="right"><b>Rp 0</b></td>
							<td colspan="3" class="text-center"><b>Tunggakan : Rp 50.000</b></td>
						</tr>
							<tr class="warning">
							<td colspan="6"><b>Tambah Pembayaran</b></td>
							</tr>
							<tr>
								<td colspan="2">Tanggal Bayar</td>
								<td>Jumlah Bayar</td>
								<td>Cara Bayar</td>
								<td>Keterangan</td>
								<td>Bayar</td>
							</tr>
							<tr>
								<form method="POST" action="" class="form-horizontal"></form>
									<input type="hidden" class="form-control" name="idTagihanBebas" value="476">
									<td colspan="2"><input type="text" class="form-control datepicker" name="tglBayar" value="2020-03-16" readonly=""></td>
									<td>
										<input type="hidden" id="sisa" name="sisa" value="50000">
										<input type="text" id="hitungBayaran" class="form-control harusAngka" name="jumlahBayar" value="50000" required="">
									</td>
									<td>
										<select name="caraBayar" class="form-control">
											<option value="Tunai">Tunai</option>
											<option value="Transfer">Transfer</option>
										</select>
									</td>
									<td>
										<select class="form-control" name="ketBayar" required="">
											<option value="Lunas">Lunas</option>
											<option value="Angsuran 1">Angsuran 1</option>
											<option value="Angsuran 2">Angsuran 2</option>
											<option value="Angsuran 3">Angsuran 3</option>
										</select>
									</td>
									<td><input type="submit" class="btn btn-success" name="simpanBayar" value="Bayar"></td>				
							</tr>
					</tbody>
				</table>
				
			</div><!-- /.box-body -->
			<div class="box-footer">
				
			</div>
		</div><!-- /.box -->
	</div>
	</div>		</section>
                   


<!-- end form -->                      
                </div>

            </div>

            <!-- /.col-->
        </div>
    </div>
</div>
</div>

@endsection

@section('javascript')

@endsection