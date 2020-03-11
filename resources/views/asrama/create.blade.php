  @extends('dashboard.base')

  @section('content')
  <div class="container-fluid">
      <div class="fade-in">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header"><strong>TAMBAH DATA ASRAMA</strong></div>
                      <div class="card-body">
                          @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          @endif
                          <form class="form-horizontal" action="{{ route('asrama.store') }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">KODE ASRAMA</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="text-input" type="text" name="kode" placeholder="Text">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="email-input">NAMA</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="email-input" type="text-input" name="nama" placeholder="Enter Email" autocomplete="email"><span class="help-block"></span>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="password-input">JUMLAH KAMAR</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="password-input" type="number" name="jumlah" placeholder="Password" autocomplete="new-password"><span class="help-block"></span>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label">TIPE ASRAMA</label>
                                  <div class="col-md-9 col-form-label">
                                      <div class="form-check">
                                          <input class="form-check-input" id="radio1" type="radio" value="1" name="kelamin">
                                          <label class="form-check-label" for="radio1">LAKI - LAKI</label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" id="radio2" type="radio" value="2" name="kelamin">
                                          <label class="form-check-label" for="radio2">PEREMPUAN</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="textarea-input">KETERANGAN</label>
                                  <div class="col-md-9">
                                      <textarea class="form-control" id="textarea-input" name="keterangan" rows="9" placeholder="Content.."></textarea>
                                  </div>
                              </div>

                      </div>
                      <div class="card-footer">
                          <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
                          <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                      </div>
                  </div>
                  </form>
              </div>

              <!-- /.col-->
          </div>
      </div>
  </div>



  @endsection

  @section('javascript')

  @endsection