@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Mutasi Santri</h4></div>
			<!-- /.box-header -->
			<div class="box-body">

			<div class="col-sm-6">
								<form method="GET" action="" class="form-horizontal">
					<input type="hidden" name="view" value="siswa">
					<table class="table-responsive">
						<tbody>
							<br>
							<tr>
							<div class="container-fluid"><h5>Data Awal </h5></div>
							</tr>
							<tr>
								<td>
									<select id="kelas" name="kelas" class="form-control">
										<option value="" selected=""> - Pilih Filter - </option>
                                        <option value="1">ASRAMA</option>
                                        <option value="3">SEKOLAH</option>
                                        <option value="5">JENIS KELAMIN</option>
                                        <option value="6">TAHUN MASUK</option>                     
                                    </select>
								</td>
								<td>
									<select class="form-control" name="status">
										<option value="">- Rincian Filter -</option>
										<option value="Aktif">Aktif</option>
										<option value="Non Aktif">Non Aktif</option>
										<option value="Drop Out">Drop Out</option>
										<option value="Pindah">Pindah</option>
										<option value="Lulus">Lulus</option>
									</select>
								</td>
								<td width="100">
									<input type="submit" name="tampil" value="Tampilkan" class="btn btn-outline-primary">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>

			<div class="col-sm-6">
								<form method="GET" action="" class="form-horizontal">
					<input type="hidden" name="view" value="siswa">
					<table class="table-responsive">
						<tbody>
							<br>
							<tr>
							<div class="container-fluid"><h5>Pindah Ke-</h5></div>
							</tr>
							<tr>
								<td>
									<select id="kelas" name="kelas" class="form-control">
										<option value="" selected=""> - Pilih Filter - </option>
                                        <option value="1">ASRAMA</option>
                                        <option value="3">SEKOLAH</option>
                                        <option value="5">JENIS KELAMIN</option>
                                        <option value="6">TAHUN MASUK</option>                     
                                    </select>
								</td>
								<td>
									<select class="form-control" name="status">
										<option value="">- Rincian Filter -</option>
										<option value="Aktif">Aktif</option>
										<option value="Non Aktif">Non Aktif</option>
										<option value="Drop Out">Drop Out</option>
										<option value="Pindah">Pindah</option>
										<option value="Lulus">Lulus</option>
									</select>
								</td>
								<td width="100">
									<input type="submit" name="tampil" value="PINDAH !" class="btn btn-success pull-right">
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
<br>
				<div class="table-responsive">
					<div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="example1_length">
                                    <label>Show 
                                    <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option></select> entries</label></div></div>
                    <div class="col-sm-6"><div id="example1_filter" class="dataTables_filter">
                        <label>Search:
                            <input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
                        </label></div></div></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example1" class="table table-bordered table-striped table-condensed dataTable no-footer" role="grid" aria-describedby="example1_info">
						<thead>
							<tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 19px;">No</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIS: activate to sort column ascending" style="width: 77px;">NIS</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NISN: activate to sort column ascending" style="width: 205px;">NAMA</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Siswa: activate to sort column ascending" style="width: 125px;">ASRAMA</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Jenis Kelamin: activate to sort column ascending" style="width: 59px;">SEKOLAH</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kelas: activate to sort column ascending" style="width: 71px;">KELAS</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Alamat: activate to sort column ascending" style="width: 35px;">JK</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="No.Hp: activate to sort column ascending" style="width: 150px;">ALAMAT (KOTA)</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Saldo Tabungan: activate to sort column ascending" style="width: 35px;">MASUK </th>
                                <th width="40" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 90px;"><input type="checkbox" id="parent"> Semua</th>
                            </tr>
						</thead>
						<tbody>
							<tr role="row" class="odd"><td class="sorting_1">1</td>
								<td>373/046/110</td>
								<td>AMALIA</td>
								<td>ABDUL KAHFI</td>
								<td>SMK</td>
								<td>09</td>
								<td>L</td>
								<td>BANDUNG</td>
								<td>2020</td>
								<td><center>
								<input type="checkbox" name="pilih[]" value="302" class="child">
								</center></td></tr></tbody>
					</table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 111 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button disabled" id="example1_ellipsis"><a href="#" aria-controls="example1" data-dt-idx="6" tabindex="0">…</a></li><li class="paginate_button "><a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0">12</a></li><li class="paginate_button next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="8" tabindex="0">Next</a></li></ul></div></div></div></div>
				</div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
    </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection