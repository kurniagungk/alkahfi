 <div class="card">
     <div class="card-header"><strong>Tambah</strong> Tahun Ajaran</div>
     <div class="card-body">
         @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
         @endif

         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">Tahun Ajaran</label>
             <div class="col-md-9">
                 <input wire:model="nama" class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
                 @error('nama') <span class="error">{{ $message }}</span> @enderror
             </div>
         </div>


         <div class="form-group row">
             <label class="col-md-3 col-form-label" for="text-input">periode</label>
             <div class="col-md-3">
                 <input wire:model="awal" class="form-control" id="date-input" type="date" name="date-input" placeholder="date">
                 @error('awal') <span class="error">{{ $message }}</span> @enderror
             </div>

             <div class="col-md-3">
                 <input wire:model="akhir" class="form-control" id="date-input" type="date" name="date-input" placeholder="date">
                 @error('akhir') <span class="error">{{ $message }}</span> @enderror
             </div>

         </div>



     </div>
     <div class="card-footer">
         <button wire:click="store" class=" btn btn-sm btn-primary" type="submit">
             <div wire:loading wire:target="store">
                 <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
             </div>
             Submit
         </button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>

 </div>

 @push('scripts')

 @endpush
