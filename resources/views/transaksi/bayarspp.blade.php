@extends('dashboard.base')

@section('content')

<!-- form header -->
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><strong>Pembayaran</strong> Syahriah</div>
                    <div class="card-body">
                    <div class="container-fluid">
    
    <div class="fade-in">
      <div class="row">
         <div class="col-sm-12">
             <div class="card">              
                <div class="box box-warning box-solid">
			
			<div class="box-body" style="display: block;">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No.</th>
							<th>Bulan</th>
							<th>Tagihan</th>
							<th>Status</th>
							<th>Tgl Bayar</th>
							<th>Opsi</th>
							<th>Bayar</th>
							<th>Cetak</th>
						</tr>
					</thead>
					<tbody>
						<tr style="color:green">
								<td>1</td>
								<td>Januari</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-success">Lunas</span></td>
								<td>12-03-2020</td>
								<td>Tunai</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-danger" type="submit"> Hapus</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:green">
								<td>2</td>
								<td>Februari</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-success">Lunas</span></td>
								<td>12-03-2020</td>
								<td>Tunai</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-danger" type="submit"> Hapus</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:green">
								<td>3</td>
								<td>Maret</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-success">Lunas</span></td>
								<td>12-03-2020</td>
								<td>Transfer</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-danger" type="submit"> Hapus</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:green">
								<td>4</td>
								<td>April</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-success">Lunas</span></td>
								<td>12-03-2020</td>
								<td>Transfer</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-danger" type="submit"> Hapus</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>5</td>
								<td>Mei</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>6</td>
								<td>Juni</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>7</td>
								<td>Juli</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>8</td>
								<td>Agustus</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>9</td>
								<td>September</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>10</td>
								<td>Oktober</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>11</td>
								<td>November</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
								</td>
                            </tr>
                    </tbody>
                    <tbody>
						<tr style="color:red">
								<td>12</td>
								<td>Desember</td>
								<td>Rp. 100.000</td>
								<td><span class="badge badge-warning" >Belum Bayar</span></td>
								<td>12-03-2020</td>
								<td>
                                    <select class="form-control" id="select1" name="bayar">
                                        <option value="0">Tunai</option>
                                        <option value="1">Transfer</option>
                                    </select>
                                </td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-success" type="submit"> Bayar</button>
								</td>
								<td width="40" style="text-align:center">
                                <button class="btn btn-sm btn-primary" type="submit"> Cetak</button>
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