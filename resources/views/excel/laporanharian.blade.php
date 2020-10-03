 <table>
     <thead>
         <tr>
             <th height="25" colspan="{{count($tagihan) + 4}}">Laporan harian</th>
         </tr>
         <tr>
             <th colspan="3">Tanggal</th>
             <th colspan="3">Tanggal</th>
             <th colspan="3">{{$tanggal['awal']}}</th>
             <th colspan="3">-</th>
             <th colspan="3">{{$tanggal['akhir']}}</th>
         </tr>
         <tr>
             <th>NO</th>
             <th>NAMA</th>
             <th>KELAS</th>
             @foreach($tagihan as $t)
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
         $sum = 0;
         @endphp
         <tr>
             <td>{{$loop->index + 1}}</td>
             <td>{{$d['nama']}}</td>
             <td>{{$d['kelas']}}</td>
             @foreach ($d['tagihan'] as $dt)
             @php
             $sum += $dt->sum('bayar');
             $total += $dt->sum('bayar');
             @endphp
             <td>{{$dt->sum('bayar') ?? ''}}</td>
             @endforeach
             <td>{{$sum}}</td>
         </tr>
         @endforeach
         <tr>
             <td colspan="3">jumlah</td>
             @foreach($tagihan as $t)
             <th>{{$t->tagihan->sum('bayar')}}</th>
             @endforeach
             <td>{{$total}}</td>
         </tr>
     </tbody>
 </table>
