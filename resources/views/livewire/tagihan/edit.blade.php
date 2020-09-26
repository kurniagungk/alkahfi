 <div class="card">
     <div class="card-header"><strong>Basic Form</strong> Elements</div>
     <div class="card-body">
         @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
         @endif

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Input MAP</label>
             <div class="col-md-9">
                 <input wire:model="map" class="form-control" type="text" name="text-input" placeholder=". . . ">
                 @error('map') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Text Input</label>
             <div class="col-md-9">
                 <input wire:model="nama" class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
                 @error('nama') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>


         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="select1">tahun ajaran</label>
             <div class="col-md-9">
                 <select class="form-control" id="select1" wire:model="tahun">
                     <option value="">- Tahun Ajaran -</option>
                     @foreach ($TahunAjaran as $data)
                     <option value="{{$data->id}}">{{$data->nama}}</option>
                     @endforeach
                 </select>
                 @error('tahun') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label">Periode</label>
             <div class="col-md-9 col-form-label">
                 <div class="form-check form-check-inline mr-1">
                     <input wire:model="periode" class="form-check-input" id="inline-radio1" type="radio" value="spp" name="inline-radios">
                     <label class="form-check-label" for="inline-radio1">Bulanan</label>
                 </div>
                 <div class="form-check form-check-inline mr-1">
                     <input wire:model="periode" class="form-check-input" id="inline-radio2" type="radio" value="cicilan" name="inline-radios">
                     <label class="form-check-label" for="inline-radio2">Cicilan</label>
                 </div>
                 @error('periode') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

     </div>
     <div class="card-footer">
         <button wire:click="update" class=" btn btn-sm btn-primary" type="submit">
             <div wire:loading wire:target="update">
                 <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
             </div>
             Submit
         </button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>

 </div>
