@extends('dashboard.base')

@section('content')

<div class="container-fluid">
    <div class="fade-in">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header"><h4>Data Pos Keuangan</h4></div>
              <input type="hidden" name="view" value="jenisbayar">
              <table class="table table-striped">
                <tbody>
                <tr>
                  
                    <td>
                      <span class="pull-right">
                        <a class="pull-right btn btn-primary" href="index.php?view=jenisbayar&amp;act=tambah">Tambahkan Data</a>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>

<!-- kolom untuk jumlah baris -->
    <div class="row">
      <div class="col-sm-6">
        <div class="dataTables_length" id="example1_length">
          <label>
            Show
            <select name="example1_length" aria-controls="example1" class="form-control input-sm">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            </select> entries</label>
          </div>
        </div>

<!-- kolom untuk pencarian -->
        <div class="col-sm-6">
          <div id="example1_filter" class="dataTables_filter">
          <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1">
        </label>
      </div>
    </div>
    </div>



 <div class="col-sm-12">
   <table id="example1" class="table table-bordered table-striped dataTable no-footer" role="grid" aria-describedby="example1_info">
   <thead>
     <tr role="row">
       <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 42px;">No</th>
       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="POS: activate to sort column ascending" style="width: 60px;">Nama</th>
       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama Pembayaran: activate to sort column ascending" style="width: 273px;">Keterangan</th>
       <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 100px;">Aksi</th></tr>
  </thead>
  <tbody>
    <tr role="row" class="odd"><td class="sorting_1">1</td>
      <td>SMK</td>
      <td>DANA BULANAN</td>
    <td><center>
    <button class="btn btn-sm btn-success" type="submit"> Edit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Hapus</button>
   
  
  </center></td></tr><tr role="row" class="odd"><td class="sorting_1">2</td>
      <td>PONDOK</td>
      <td>DANA KHATAMAN</td>
    <td><center>
    <button class="btn btn-sm btn-success" type="submit"> Edit</button>
    <button class="btn btn-sm btn-danger" type="reset"> Hapus</button>
    </center></td></tr></tbody>
</table></div>

                <div class="card-body">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                  </nav>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

@endsection