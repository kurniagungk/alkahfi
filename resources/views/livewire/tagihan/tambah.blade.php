 <div class="card">
     <div class="card-header"><strong>Basic Form</strong> Elements</div>
     <div class="card-body">
         @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
         @endif

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="select1">Periode Pembayaran</label>
             <div class="col-md-9">
                 <select class="form-control" wire:model="periode">
                     <option value=''>pilih salah satu</option>
                     <option {{$periode == '1' ? 'selected':''}} value="1">bulanan</option>
                     <option {{$periode == '2' ? 'selected':''}} value="2">tahun</option>
                 </select>
                 @error('periode') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Tanggal Jatuh Tempo</label>
             <div class="col-md-9">
                 @if($periode == 1 )
                 <input wire:model="tempo" class="form-control" min="1" max="31" id="number-input" type="number" name="text-input">
                 @elseif ($periode == 2 )
                 <input wire:model="tempo" class="form-control" id="date-input" type="date" name="date-input" placeholder="date">
                 @endif
                 @error('tempo') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>


         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="select1">Jenis Pembayaran</label>
             <div class="col-md-9">

                 <select class="form-control" wire:model="jenis">
                     @foreach ($dataJenis as $data)

                     <option {{$data->id_tagihan == $jenis ? 'selected':''}} value="{{$data->id_tagihan}}">{{$data->nama}}</option>

                     @endforeach
                 </select>
                 @error('jenis') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">biaya</label>
             <div class="col-md-9">
                 <input wire:model="biaya" class="form-control" id="text-input" type="number" name="text-input">
                 @error('nama') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label">Santri</label>
             <div class="col-md-9 col-form-label">
                 <div class="form-check form-check-inline mr-1">
                     <input wire:model="select" class="form-check-input" id="inline-radio1" type="radio" value="1" name="inline-radios">
                     <label class="form-check-label" for="inline-radio1">Semua</label>
                 </div>
                 <div class="form-check form-check-inline mr-1">
                     <input wire:model="select" class="form-check-input" id="inline-radio2" type="radio" value="2" name="inline-radios">
                     <label class="form-check-label" for="inline-radio2">Kelas</label>
                 </div>
             </div>
         </div>

         @if($select == 1)


         @else

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="select1">kelas</label>
             <div class="col-md-9">

                 <select class="form-control" wire:model="kelas">

                     @foreach ($DataKelas as $data)

                     <option value="{{$data->id}}">{{$data->kelas}}</option>

                     @endforeach

                 </select>
                 @error('kelas') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         @endif










     </div>
     <div class="card-footer">
         <button wire:click="tambah" class=" btn btn-sm btn-primary" type="submit"> Submit</button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>

 </div>
