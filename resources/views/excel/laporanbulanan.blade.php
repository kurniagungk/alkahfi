 <table>
     <thead>
         <tr>
             <th height="25" colspan="7">Laporan harian</th>
         </tr>
         <tr>
             <th colspan="3">Tanggal</th>
             <th colspan="3">{{$tanggal['awal']}}</th>
             <th colspan="3">-</th>
             <th colspan="3">{{$tanggal['akhir']}}</th>
         </tr>
         <tr>
             <th>NO</th>
             <th>MAP</th>
             <th>JENIS PEMASUKAN</th>
             <th>JUMLAH</th>
             <th>MAK</th>
             <th>JENIS PENGELUARAN</th>
             <th>JUMLAH</th>
         </tr>
     </thead>
     <tbody>

         @php
         $map = 0 ;
         $mak = 0;
         @endphp

         @foreach($data as $d)
         @php
         $row = count($d->pengeluaran)>1 ? count($d->pengeluaran): 1 ;
         $map += $d->tagihan->sum('bayar');
         @endphp
         <tr>
             <td rowspan="{{$row}}">{{$loop->index +1}}</td>
             <td rowspan="{{$row}}">{{$d->map}}</td>
             <td rowspan="{{$row}}">{{$d->nama}}</td>
             <td rowspan="{{$row}}">{{$d->tagihan->sum('bayar')}}</td>
             @forelse($d->pengeluaran as $p)
             @php
             $mak += $p->jumlah;
             @endphp
             @if($loop->index == 0)
             <td>{{$d->map}}</td>
             <td>{{$p->keterangan}}</td>
             <td>{{$p->jumlah}}</td>
         </tr>
         @else
         <tr>
             <td>{{$d->map}}</td>
             <td>{{$p->keterangan}}</td>
             <td>{{$p->jumlah}}</td>
         </tr>
         @endif

         @empty
         </tr>
         @endforelse

         @endforeach
         <tr>
             <td colspan="3">jumlah map</td>
             <td>{{$map}}</td>
             <td colspan="2">jumlah mak</td>
             <td>{{$mak}}</td>
         </tr>
     </tbody>
 </table>
