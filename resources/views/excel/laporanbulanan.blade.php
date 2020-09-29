 <table>
     <thead>
         <tr>
             <th height="25" colspan="5">Laporan harian</th>
         </tr>
         <tr>
             <th colspan="3">Tanggal</th>
             <th colspan="3">{{$tanggal}}</th>
         </tr>
         <tr>
             <th>No</th>
             <th>MAP</th>
             <th>JENIS PEMASUKAN</th>
             <th>JUMLAH</th>
             <th>MAK</th>
             <th>JUMLAH</th>
         </tr>
     </thead>
     <tbody>

         @foreach($data as $d)
         <tr>
             <td>{{$loop->index +1}}</td>
             <td>{{$d->map}}</td>
             <td>{{$d->nama}}</td>
             <td>{{$d->tagihan->sum('bayar')}}</td>
             <td>{{$d->map}}</td>
             <td>{{$d->pengeluara->sum('jumlah')}}</td>
         </tr>
         @endforeach
     </tbody>
 </table>
