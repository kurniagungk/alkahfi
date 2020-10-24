<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th height="25" colspan="{{count($jenistagihan) + 4}}">Laporan harian</th>
            </tr>
            <tr>
                <th colspan="2">Tanggal</th>
                <th>{{date("d-m-Y")}}</th>
            </tr>
            <tr>
                <th>NO</th>
                <th>NAMA</th>
                <th>KELAS</th>
                @foreach($jenistagihan as $t)
                <th>{{$t->nama}}</th>
                @endforeach
                <th>jumlah</th>
            </tr>
        </thead>
        <tbody>
            @php
            $total = 0;
            @endphp
            @foreach($data as $d)
            @php
            $jumlah = 0;
            @endphp
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$d['nama']}}</td>
                <td>{{$d['kelas']}}</td>
                @foreach ($d['tagihan'] as $dt)
                <td>{{$dt->sum('jumlah') - $dt->sum('bayar') }}</td>
                @php
                $jumlah += $dt->sum('jumlah') - $dt->sum('bayar') ;
                $total += $dt->sum('jumlah') - $dt->sum('bayar') ;
                @endphp
                @endforeach
                <td>{{$jumlah}}</td>
            </tr>
            @endforeach
            <tr>

                <td colspan="3">jumlah</td>
                @foreach($jenistagihan as $t)
                <th>{{$t->tagihan->sum('jumlah')}}</th>
                @endforeach
                <td>{{$total}}</td>
            </tr>
        </tbody>
    </table>
</div>

