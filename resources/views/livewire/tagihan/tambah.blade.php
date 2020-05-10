 <div class="card">
     <div class="card-header"><strong>Basic Form</strong> Elements</div>
     <div class="card-body">
         @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
         @endif

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="select1">Jenis Pembayaran</label>
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
             <label class="col-md-3 col-form-label" for="select1">kelas</label>
             <div class="col-md-9">

                 <select class="form-control" wire:model="kelas">

                     <option value="1">12</option>
                     <option value="2">13</option>

                 </select>
                 @error('periode') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">biaya</label>
             <div class="col-md-9">
                 <input wire:model="biaya" class="form-control" id="text-input" type="number" name="text-input">
                 @error('nama') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>












     </div>
     <div class="card-footer">
         <button wire:click="tambah" class=" btn btn-sm btn-primary" type="submit"> Submit</button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>

 </div>
