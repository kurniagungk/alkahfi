@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Jurnal Umum</h4></div>
            <!-- /.box-header -->
			<div class="box-body">
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
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NIS: activate to sort column ascending" style="width: 77px;">TANGGAL</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="NISN: activate to sort column ascending" style="width: 205px;">KETERANGAN</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Siswa: activate to sort column ascending" style="width: 110px;">POS BAYAR</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Jenis Kelamin: activate to sort column ascending" style="width: 150px;">JENIS BAYAR</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kelas: activate to sort column ascending" style="width: 150px;">MASUK</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Kelas: activate to sort column ascending" style="width: 150px;">KELUAR</th>
                                <th width="40" class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 150px;"><center>SALDO</center></th>
                            </tr>
						</thead>
						<tbody>
							
              <tr role="row" class="odd"><td class="sorting_1">2</td>
								<td>02-01-20</td>
								<td>SETORAN IBU NYAI</td>
								<td>PONDOK</td>
								<td>SYAHRIAH</td>
								<td>-</td>
								<td>Rp. 5.000.000</td>
                <td>Rp. 5.000.000</td></tr>
              <tr role="row" class="odd"><td class="sorting_1">1</td>
								<td>01-01-20</td>
								<td>-</td>
								<td>PONDOK</td>
								<td>SYAHRIAH</td>
								<td>Rp. 10.000.000</td>
								<td> - </td>
                <td>Rp. 10.000.000</td></tr>

              
            </tbody>
					</table></div></div>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
    </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection