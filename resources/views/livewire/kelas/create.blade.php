 <div class="card">
     <div class="card-header"><strong>Basic Form</strong> Elements</div>
     <div class="card-body">
         @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
         @endif

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Tingkat</label>
             <div class="col-md-9">
                 <input wire:model="tingkat" class="form-control" id="text-number" type="number" name="text-input" placeholder="Text">
                 @error('tingkat') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Kelas</label>
             <div class="col-md-9">
                 <input wire:model="kelas" class="form-control" id="text-number" type="text" name="text-input" placeholder="Text">
                 @error('kelas') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>


         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Keterangan</label>
             <div class="col-md-9">
                 <input wire:model="ket" class="form-control" id="text-number" type="text" name="text-input" placeholder="Text">
                 @error('ket') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>


     </div>
     <div class="card-footer">
         <button wire:click="store" class=" btn btn-sm btn-primary" type="submit"> Submit</button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>

 </div>

 @push('scripts')

 @endpush
