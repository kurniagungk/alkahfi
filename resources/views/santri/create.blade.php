  @extends('dashboard.base')

  @section('content')
  <div class="container-fluid">
      <div class="fade-in">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header"><strong>Input</strong> Data Santri</div>
                      <div class="card-body">
                          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                              <!-- <div class="form-group row">
                                  <label class="col-md-3 col-form-label">Static</label>
                                  <div class="col-md-9">
                                      <p class="form-control-static">Username</p>
                                  </div>
                              </div> -->
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">NIS</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Nomor Induk Pondok . . .">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">Nama Lengkap</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="text-input" type="text" name="text-input" placeholder=". . ."><span class="help-block">* Sesuai ijazah</span>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="date-input">Tanggal Lahir</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="date-input" type="date" name="date-input" placeholder="date">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="textarea-input">Alamat</label>
                                  <div class="col-md-9">
                                      <textarea class="form-control" id="textarea-input" name="textarea-input" rows="5" placeholder="Isi Sesuai KK . . ."></textarea>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="select1">Lembaga</label>
                                  <div class="col-md-9">
                                      <select class="form-control" id="select1" name="select1">
                                          <option value="0">- Pilih Lembaga -</option>
                                          <option value="1">Pondok</option>
                                          <option value="2">SMK</option>
                                          <option value="3">SMA</option>
                                          <option value="3">SMP</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="select1">Sub lembaga</label>
                                  <div class="col-md-9">
                                      <select class="form-control" id="select1" name="select1">
                                          <option value="0">- Pilih Sub Lembaga -</option>
                                          <option value="1">Abdurl Kahfi</option>
                                          <option value="2">Abdurahman</option>
                                          <option value="3">XI-IPA</option>
                                          <option value="3">IX-A</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                  <div class="col-md-9 col-form-label">
                                      <div class="form-check form-check-inline mr-1">
                                          <input class="form-check-input" id="inline-radio1" type="radio" value="option1" name="inline-radios">
                                          <label class="form-check-label" for="inline-radio1">Laki-laki</label>
                                      </div>
                                      <div class="form-check form-check-inline mr-1">
                                          <input class="form-check-input" id="inline-radio2" type="radio" value="option2" name="inline-radios">
                                          <label class="form-check-label" for="inline-radio2">Perempuan</label>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">Tahun Masuk</label>
                                  <div class="col-md-9">
                                    <select class="form-control" id="ccyear" width="100">
                                    <option>2014</option>
                                    <option>2015</option>
                                    <option>2016</option>
                                    <option>2017</option>
                                    <option>2018</option>
                                    <option>2019</option>
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    <option>2025</option>
                                    </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">Orang Tua / Wali</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Ex. Ahmad . . .">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="text-input">No Telp / Hp</label>
                                  <div class="col-md-9">
                                      <input class="form-control" id="text-input" type="text" name="text-input" placeholder="08128888xxxx">
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-3 col-form-label" for="file-input">Pas Foto</label>
                                  <div class="col-md-9">
                                      <input id="file-input" type="file" name="file-input"><span class="help-block">* Ukuran (3x4) Format .jpg</span>
                                  </div>
                              </div>
                              
                          </form>
                      </div>
                      <div class="card-footer">
                          <button class="btn btn-sm btn-success" type="submit"> Simpan</button>
                          <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                      </div>
                  </div>

              </div>

              <!-- /.col-->
          </div>
      </div>
  </div>


  @endsection

  @section('javascript')

  @endsection