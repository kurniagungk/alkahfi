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
             <th>NO</th>
             <th>NAMA</th>
             <th>KELAS</th>
             @foreach($tagihan as $t)
             <th>{{$t->nama}}</th>
             @endforeach
         </tr>
     </thead>
     <tbody>

         @foreach($data as $d)
         <tr>
             <td>{{$loop->index + 1}}</td>
             <td>{{$d['nama']}}</td>
             <td>{{$d['kelas']}}</td>
             @foreach ($d['tagihan'] as $dt)
             <td>{{$dt->sum('bayar') ?? ''}}</td>
             @endforeach
         </tr>
         @endforeach
         <tr>
             <td colspan="3">jumlah</td>
             @foreach($tagihan as $t)
             <th>{{$t->tagihan->sum('bayar')}}</th>
             @endforeach
         </tr>
     </tbody>
 </table>
