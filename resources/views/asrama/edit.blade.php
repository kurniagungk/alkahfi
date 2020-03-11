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
                          <form class="form-horizontal" action="{{ route('asrama.update', $asrama) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">KODE ASRAMA</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="text-input" value="{{$asrama->kode}}" type="text" name="kode" placeholder="Text">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="email-input">NAMA</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="email-input" type="text-input" value="{{$asrama->nama}}" name="nama" placeholder="Enter Email" autocomplete="email"><span class="help-block"></span>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="password-input">JUMLAH KAMAR</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="password-input" value="{{$asrama->jumlah}}" type="number" name="jumlah" placeholder="Password" autocomplete="new-password"><span class="help-block"></span>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label">TIPE ASRAMA</label>
                                  <div class="col-md-9 col-form-label">
                                      @if ($asrama->kelamin == '1')
                                      <div class="form-check">
                                          <input checked class="form-check-input" id="radio1" type="radio" value="1" name="kelamin">
                                          <label class="form-check-label" for="radio1">LAKI - LAKI</label>
                                      </div>
                                      <div class="form-check">
                                          <input class="form-check-input" id="radio2" type="radio" value="2" name="kelamin">
                                          <label class="form-check-label" for="radio2">PEREMPUAN</label>
                                      </div>
                                      @else
                                      <div class="form-check">
                                          <input class="form-check-input" id="radio1" type="radio" value="1" name="kelamin">
                                          <label class="form-check-label" for="radio1">LAKI - LAKI</label>
                                      </div>
                                      <div class="form-check">
                                          <input checked class="form-check-input" id="radio2" type="radio" value="2" name="kelamin">
                                          <label class="form-check-label" for="radio2">PEREMPUAN</label>
                                      </div>

                                      @endif



                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="textarea-input">KETERANGAN</label>
                                  <div class="col-md-9">
                                      <textarea class="form-control" id="textarea-input" name="Keterangan" rows="9" placeholder="Content..">{{$asrama->Keterangan}}</textarea>
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