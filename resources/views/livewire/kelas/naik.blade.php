<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Santri</h4>
                </div>
                <!-- /.box-header -->
                <div class="card-body">
                    <div class="form-row align-items-center">
                        <div class="col-sm-2 my-2 ">
                            <label class="sr-only" for="inlineFormInputGroupUsername"></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="c-icon cil-search"></i>
                                    </div>
                                </div>
                                <input wire:model="search" type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Cari">
                            </div>
                        </div>

                        <div class="col-sm-3 my-1 mx-3">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Sekolah
                                    </div>
                                </div>
                                <select wire:model="selectKelas" class="form-control" name="status">
                                    <option value="0" selected>- pilih Sekolah -</option>
                                    <option value="1" selected>- SMP -</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 my-1 mx-3">
                            <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Kelas
                                    </div>
                                </div>
                                <select wire:model="selectKelas" class="form-control" name="status">
                                    <option value="0" selected>- pilih kelas -</option>
                                    <option value="1" selected>- IV -</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <a class="btn btn-success" href="/">Naik</a>
                        </div>

                    </div>

                    <table id="TabelSantri" class="table table-responsive-sm" role="grid" aria-describedby="example1_info">
                        <thead>
                            <tr>

                                <th>No</th>
                                <th>NISM</th>
                                <th>NISN</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>JK</th>
                                <th>
                                    <center>Pilih</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>asd</td>
                                <td>asd</td>
                                <td>as</td>
                                <td>sad</td>
                                <td>asd</td>
                                <td>asd</td>
                                <td>
                                    <center>
                                        <label class="c-switch c-switch-label c-switch-pill c-switch-success">
                                            <input class="c-switch-input" type="checkbox" checked=""><span class="c-switch-slider" data-checked="On" data-unchecked="Off"></span>
                                        </label>
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>