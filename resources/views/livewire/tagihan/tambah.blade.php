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
                     <option value="1">bulanan</option>
                     <option value="2">tahun</option>
                 </select>
                 @error('periode') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         @if($dataJenis)
         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="select1">Jenis Pembayaran</label>
             <div class="col-md-9">

                 <select class="form-control" wire:model="jenis">
                     @foreach ($dataJenis as $data)

                     <option value="{{$data->id_tagihan}}">{{$data->nama}}</option>

                     @endforeach
                 </select>
                 @error('periode') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>
         @else

         @endif







     </div>
     <div class="card-footer">
         <button wire:click="asd" class=" btn btn-sm btn-primary" type="submit"> Submit</button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>

 </div>
