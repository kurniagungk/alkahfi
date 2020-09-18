  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
          <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama</th>
              @role('admin')
              <th>Sekolah</th>
              @endrole
              <th>Kelas</th>
              <th>Jumlah Tunggakan</th>
          </tr>
      </thead>
      <tbody>
          @if($data)
          @foreach ($data as $tunggakan)
          <tr>
              <td>{{$loop->index + 1}}</td>
              <td>{{$tunggakan->nisn }}</td>
              <td>{{$tunggakan->nama }}</td>
              @role('admin')
              <td>{{$tunggakan->sekolah->nama}}</td>
              @endrole
              <td>{{$tunggakan->kelas->tingkat }} - {{$tunggakan->kelas->kelas }}</td>
              <td>{{$tunggakan->tagihan->sum('jumlah') - $tunggakan->tagihan->sum('bayar_count')}} </td>
          </tr>

          @endforeach
          @endif
      </tbody>
  </table>
