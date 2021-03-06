@extends('dashboard.base')

@section('content')


          
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i>Data Pengguna (Users)</div>
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Tingkat Akses</th>
                    <th>Nomor Telepon/ HP</th>
                    <th>Email Verifikasi</th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                                              <tr>
                      <td>admin</td>
                      <td>admin@admin.com</td>
                      <td>user,admin</td>
                      <td>08972xxx715</td>
                      <td>2020-02-19 16:49:39</td>
                      <td>
                        <a href="http://127.0.0.1:8000/users/1" class="btn btn-block btn-primary">View</a>
                      </td>
                      <td>
                        <a href="http://127.0.0.1:8000/users/1/edit" class="btn btn-block btn-primary">Edit</a>
                      </td>
                      <td>
                                                      </td>
                    </tr>
                                              <tr>
                      <td>Dr. Gilbert Lubowitz DVM</td>
                      <td>geovany.fahey@example.org</td>
                      <td>user</td>
                      <td>08972xxx715</td>
                      <td>2020-02-19 16:49:39</td>
                      <td>
                        <a href="http://127.0.0.1:8000/users/2" class="btn btn-block btn-primary">View</a>
                      </td>
                      <td>
                        <a href="http://127.0.0.1:8000/users/2/edit" class="btn btn-block btn-primary">Edit</a>
                      </td>
                      <td>
                                                        <form action="http://127.0.0.1:8000/users/2" method="POST">
                            <input type="hidden" name="_method" value="DELETE">                                    <input type="hidden" name="_token" value="jcGCfkhW2NZ5K6do9o6mJxhoTlH0j7hwJfJrN3ow">                                    <button class="btn btn-block btn-danger">Delete User</button>
                        </form>
                                                      </td>
                    </tr>
                                              <tr>
                      <td>Prof. Willis O'Reilly</td>
                      <td>eolson@example.com</td>
                      <td>user</td>
                      <td>08972xxx715</td>
                      <td>2020-02-19 16:49:39</td>
                      <td>
                        <a href="http://127.0.0.1:8000/users/3" class="btn btn-block btn-primary">View</a>
                      </td>
                      <td>
                        <a href="http://127.0.0.1:8000/users/3/edit" class="btn btn-block btn-primary">Edit</a>
                      </td>
                      <td>
                                                        <form action="http://127.0.0.1:8000/users/3" method="POST">
                            <input type="hidden" name="_method" value="DELETE">                                    <input type="hidden" name="_token" value="jcGCfkhW2NZ5K6do9o6mJxhoTlH0j7hwJfJrN3ow">                                    <button class="btn btn-block btn-danger">Delete User</button>
                        </form>
                                                      </td>
                    </tr>
                     
                                          </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection

@section('javascript')

@endsection