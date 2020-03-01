@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Data Pengeluaran</h4></div>
            <!-- /.box-header -->
			<div class="box-body">
								<form method="GET" action="" class="form-horizontal">
					<input type="hidden" name="view" value="siswa">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td>
									<select id="kelas" name="kelas" class="form-control">
										<option value="" selected=""> - Pos Keluar - </option>
                                        <option value="1">ASRAMA</option>
                                        <option value="3">SEKOLAH</option>
                                        <option value="5">JENIS KELAMIN</option>
                                        <option value="6">TAHUN MASUK</option>
                                        
                                    </select>
								</td>
								<td>
									<select class="form-control" name="status">
										<option value="">- Jenis Keluar -</option>
										<option value="Aktif">Aktif</option>
										<option value="Non Aktif">Non Aktif</option>
										<option value="Drop Out">Drop Out</option>
										<option value="Pindah">Pindah</option>
										<option value="Lulus">Lulus</option>
									</select>
								</td>
								<td width="100">
									<input type="submit" name="tampil" value="Tampilkan" class="btn btn-success pull-right">
								</td>
								<td>
								
									<span class="pull-right">
										
										<a class="btn btn-primary" href="index.php?view=siswa&amp;act=tambah">Tambahkan Data</a>
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIS: activate to sort column ascending" style="width: 77px;">KODE</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NISN: activate to sort column ascending" style="width: 205px;">NAMA PENGELUARAN</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Siswa: activate to sort column ascending" style="width: 50px;">POS</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Jenis Kelamin: activate to sort column ascending" style="width: 150px;">JENIS KELUAR</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kelas: activate to sort column ascending" style="width: 150px;">JUMLAH</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kelas: activate to sort column ascending" style="width: 200px;">KETERANGAN</th>
                                <th width="40" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 120px;"><center>Aksi</center></th>
                            </tr>
						</thead>
						<tbody>
							<tr role="row" class="odd"><td class="sorting_1">1</td>
								<td>L-0001</td>
								<td>SETORAN IBU NYAI</td>
								<td>PONDOK</td>
								<td>KOS MAKAN</td>
								<td>Rp. 10.000.000</td>
								<td>CAMPURAN</td>
								<td><center>
								<button class="btn btn-sm btn-success" type="submit"> Edit</button>
                                <button class="btn btn-sm btn-danger" type="reset"> Hapus</button>
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