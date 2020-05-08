 <div class="card">
     <div class="card-header"><strong>Basic Form</strong> Elements</div>
     <div class="card-body">
         @if (session()->has('message'))
         <div class="alert alert-success">
             {{ session('message') }}
         </div>
         @endif
         <form class="form-horizontal" wire:submit.prevent="store" enctype="multipart/form-data">
             <div class="form-group row">
                 <label class="col-md-3 col-form-label" for="text-input">Text Input</label>
                 <div class="col-md-9">
                     <input wire:model="nama" class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
                     @error('nama') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>

             <div class="form-group row">
                 <label class="col-md-3 col-form-label" for="select1">periode</label>
                 <div class="col-md-9">
                     <select class="form-control" wire:model="periode">
                         <option value="1">bulanan</option>
                         <option value="2">tahun</option>
                     </select>
                     @error('periode') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>

             <div class="form-group row">
                 <label class="col-md-3 col-form-label" for="select1">tahun ajaran</label>
                 <div class="col-md-9">
                     <select class="form-control" id="select1" wire:model="tahun">

                         <option value="2020">2020</option>
                         <option value="2020">2021</option>
                         <option value="2020">2022</option>
                     </select>
                     @error('tahun') <span class="error">{{ $message }}</span> @enderror
                 </div>
             </div>



     </div>
     <div class="card-footer">
         <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
     </div>
     </form>
 </div>
