@extends('dashboard.base')

@section('content')

<div class="container-fluid">
  <div class="fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header"> Bootstrap Modals</div>
          <div class="card-body">
            <!-- Button trigger modal-->
            <button class="btn btn-secondary mb-1" type="button" data-toggle="modal" data-target="#myModal">Launch demo modal</button>
            <button class="btn btn-secondary mb-1" type="button" data-toggle="modal" data-target="#largeModal">Launch large modal</button>
            <button class="btn btn-secondary mb-1" type="button" data-toggle="modal" data-target="#smallModal">Launch small modal</button>
            <hr>
            <button class="btn btn-primary mb-1" type="button" data-toggle="modal" data-target="#primaryModal">Primary modal</button>
            <button class="btn btn-success mb-1" type="button" data-toggle="modal" data-target="#successModal">Success modal</button>
            <button class="btn btn-warning mb-1" type="button" data-toggle="modal" data-target="#warningModal">Warning modal</button>
            <button class="btn btn-danger mb-1" type="button" data-toggle="modal" data-target="#dangerModal">Danger modal</button>
            <button class="btn btn-info mb-1" type="button" data-toggle="modal" data-target="#infoModal">Info modal</button>
          </div>
        </div>
      </div>
      <!-- /.col-->
    </div>
    <!-- /.row-->
  </div>
</div>


@endsection

@section('javascript')

@endsection