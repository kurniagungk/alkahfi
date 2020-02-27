@extends('dashboard.base')

@section('content')

    
<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Data Mutasi Santri</h4></div>



<div class="row"><div class="col-md-6">
    <div class="box box-solid box-primary">
		<div class="box-header with-border">
		  <h4 class="box-title"> Pilih Kelas Awal</h4>
		</div><!-- /.box-header -->
		<div class="box-body">
		  <form method="GET" action="" class="form-horizontal">
			<input type="hidden" name="view" value="kenaikankelas">					  
			<div class="form-group">
				<label for="" class="col-sm-4 control-label">Kelas Awal</label>
				<div class="col-sm-4">
				  <select name="idKelas" class="form-control">
				  	<option value="">- SEMUA KELAS -</option>
					<option value="1">X OTKP</option><option value="3">X APH</option><option value="4" selected="selected">X TKJ</option><option value="5">XI TKJ</option><option value="6">XI OTKP</option><option value="7">XI APH</option><option value="8">XII APH</option>				  </select>
				</div>
				<div class="col-sm-4">
					<input type="submit" name="tampil" class="btn btn-warning" value="Tampilkan">
				</div>
			</div>	
		  </form>
		</div>
	</div>
</div>
<div class="col-md-6">
    <div class="box box-solid box-warning">
		<div class="box-body">
			<p>Warning!... !<br>Halaman ini digunakan untuk memindahkan semua atau beberapa santri dari asrama/kelas satu ke lainnya jika diperlukan. Jika ada santri yang telah dibuatkan tagihan dan dipindah kelasnya melalui halaman ini, 
				maka tagihan tetap ada di kelas sebelumnya!</p>
		</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="box box-solid box-success">
		<!-- <div class="box-header">
			<h4 class="box-title">Pilih Siswa Yang Akan di Proses</h4>
		</div> -->
		<form method="POST" action="" class="form-horizontal">
			<div class="box-body">
				<table class="table table-striped">
					<tbody><tr>
						<th>No.</th>						
						<th>NIS</th>
						<th>Nama Siswa</th>
						<th>Kelas</th>
						<th>Status</th>
						<th><input type="checkbox" id="parent"> Pilih Semua</th>
					</tr>
										<tr>
						<td>1</td>						
						<td>376/049/110</td>
						<td>Diana Ulfa</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="302" class="child"></td>
					</tr>
										<tr>
						<td>2</td>						
						<td>377/050/110</td>
						<td>Dimas Viktor Risman</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="303" class="child"></td>
					</tr>
										<tr>
						<td>3</td>						
						<td>402/088/66</td>
						<td>Abdul Latip</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="319" class="child"></td>
					</tr>
										<tr>
						<td>4</td>						
						<td>403/089/66</td>
						<td>Abdul Rohman</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="320" class="child"></td>
					</tr>
										<tr>
						<td>5</td>						
						<td>404/090/66</td>
						<td>Ahmad Balya Irsyaduddin</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="321" class="child"></td>
					</tr>
										<tr>
						<td>6</td>						
						<td>405/091/66</td>
						<td>Ahmad Fathurrohman</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="322" class="child"></td>
					</tr>
										<tr>
						<td>7</td>						
						<td>406/092/66</td>
						<td>Ahmad Taufiqur Rohman</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="323" class="child"></td>
					</tr>
										<tr>
						<td>8</td>						
						<td>317/043/66</td>
						<td>Andri Kristina Putra</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="324" class="child"></td>
					</tr>
										<tr>
						<td>9</td>						
						<td>408/094/66</td>
						<td>Ayu Uut Wulandari</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="325" class="child"></td>
					</tr>
										<tr>
						<td>10</td>						
						<td>428/113/66</td>
						<td>Dina Mukarromah</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="326" class="child"></td>
					</tr>
										<tr>
						<td>11</td>						
						<td>429/114/66</td>
						<td>Dini Mukarromah</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="327" class="child"></td>
					</tr>
										<tr>
						<td>12</td>						
						<td>409/095/66</td>
						<td>ERVINA GUSMIARNI</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="328" class="child"></td>
					</tr>
										<tr>
						<td>13</td>						
						<td>411/097/66</td>
						<td>Hayatun Thoyyibah</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="330" class="child"></td>
					</tr>
										<tr>
						<td>14</td>						
						<td>412/098/66</td>
						<td>Imam Mustofa</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="331" class="child"></td>
					</tr>
										<tr>
						<td>15</td>						
						<td>413/099/66</td>
						<td>Ismia Umul Azam</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="332" class="child"></td>
					</tr>
										<tr>
						<td>16</td>						
						<td>414/100/66</td>
						<td>Kartika Trisna Devi</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="333" class="child"></td>
					</tr>
										<tr>
						<td>17</td>						
						<td>415/101/66</td>
						<td>M. Azwar Anas</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="334" class="child"></td>
					</tr>
										<tr>
						<td>18</td>						
						<td>416/102/66</td>
						<td>Mas Hilmi Mubarrok</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="335" class="child"></td>
					</tr>
										<tr>
						<td>19</td>						
						<td>417/103/66</td>
						<td>Moh. Fikri Andriansyah</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="336" class="child"></td>
					</tr>
										<tr>
						<td>20</td>						
						<td>419/105/66</td>
						<td>Nanang Bahroji</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="337" class="child"></td>
					</tr>
										<tr>
						<td>21</td>						
						<td>420/106/66</td>
						<td>Nidia Rin Triana</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="338" class="child"></td>
					</tr>
										<tr>
						<td>22</td>						
						<td>421/107/66</td>
						<td>Nuril Islam</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="339" class="child"></td>
					</tr>
										<tr>
						<td>23</td>						
						<td>423/109/66</td>
						<td>Sela Arista</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="341" class="child"></td>
					</tr>
										<tr>
						<td>24</td>						
						<td>424/110/66</td>
						<td>Sinta Annuriyah</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="342" class="child"></td>
					</tr>
										<tr>
						<td>25</td>						
						<td>425/111/66</td>
						<td>Very Prasetiyo</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="343" class="child"></td>
					</tr>
										<tr>
						<td>26</td>						
						<td>427/046/66</td>
						<td>Wisnu Wardana</td>
						<td>X TKJ</td>
						<td>Aktif</td>
						<td><input type="checkbox" name="pilih[]" value="345" class="child"></td>
					</tr>
									</tbody></table>
			</div>
			<div class="box-footer">
				<label for="" class="col-sm-2 control-label">Pindah / Naik Ke Kelas</label>
				<div class="col-sm-4">
				  <select name="idKelas" class="form-control">
					<option value="1">X OTKP</option><option value="3">X APH</option><option value="4">X TKJ</option><option value="5">XI TKJ</option><option value="6">XI OTKP</option><option value="7">XI APH</option><option value="8">XII APH</option>				  </select>
				</div>
				<div class="col-sm-4">
					<input type="submit" name="proses" class="btn btn-danger" value="Proses Pindah/Naik Kelas">
				</div>
			</div>
		</form>
	</div>
</div>

			</div>





@endsection

@section('javascript')

@endsection