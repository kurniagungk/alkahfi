@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Combined All Table</div>
                    <div class="card-body">
                        <table id="TabelSantri" class="table table-responsive-sm table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Date registered</th>
                                    <th>Role</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

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
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="js/app.js"></script>
<script>
    $(function() {
        $('#TabelSantri').DataTable({
            processing: true,
            serverSide: true,
            "ajax": {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": "{{route('santri.GetData')}}",
                "type": "POST"
            },
            columns: [{
                    data: 'id_santri'
                },
                {
                    data: 'no_induk'
                },
                {
                    data: 'nama'
                }

            ]


        });
    });
</script>

@endsection