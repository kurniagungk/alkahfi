 <div class="container-fluid">
     <div class="fade-in">
         <div class="row">
             <div class="col-md-6">


                 <div class="card">
                     <div class="card-header"><strong>User Register</strong></div>
                     <div class="card-body">
                         @if (session()->has('message'))
                         <div class="alert alert-success">
                             {{ session('message') }}
                         </div>
                         @endif


                         <div class="form-group row">
                             <label class="col-md-3 col-form-label" for="text-input">Nama</label>
                             <div class="col-md-9">
                                 <input wire:model="name" class="form-control" id="text" type="text">
                                 @error('name') <span class="error">{{ $message }}</span> @enderror
                             </div>
                         </div>


                         <div class="form-group row">
                             <label class="col-md-3 col-form-label" for="text-input">Email</label>
                             <div class="col-md-9">
                                 <input wire:model="email" class="form-control" id="text-number" type="email" name="text-input">
                                 @error('email') <span class="error">{{ $message }}</span> @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-md-3 col-form-label" for="text-input">Pasword</label>
                             <div class="col-md-9">
                                 <input wire:model="pasword" class="form-control" id="text" type="text">
                                 @error('pasword') <span class="error">{{ $message }}</span> @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-md-3 col-form-label" for="text-input">Re Pasword</label>
                             <div class="col-md-9">
                                 <input wire:model="rePasword" class="form-control" i type="text">
                                 @error('rePasword') <span class="error">{{ $message }}</span> @enderror
                             </div>
                         </div>

                         <div class="form-group row">
                             <label class="col-md-3 col-form-label" for="text-input">Role</label>
                             <div class="col-md-9">
                                 <select wire:model="roleId" class="form-control">
                                     <option selected value="">Choose...</option>
                                     @foreach($data['role'] as $r)
                                     <option value="{{$r->name}}">{{$r->name}}</option>
                                     @endforeach
                                 </select>
                                 @error('roleId') <span class="error">{{ $message }}</span> @enderror
                             </div>
                         </div>


                         @if($roleId != 'admin' && $roleId != '')
                         <div class="form-group row">
                             <label class="col-md-3 col-form-label" for="text-input">Sekolah</label>
                             <div class="col-md-9">
                                 <select wire:model="sekolahId" class="form-control">
                                     <option selected>Choose...</option>
                                     @foreach($data['sekolah'] as $s)
                                     <option value="{$s->id}}">{{$s->nama}}</option>
                                     @endforeach
                                 </select>
                                 @error('sekolahId') <span class="error">{{ $message }}</span> @enderror
                             </div>
                         </div>

                         @endif

                     </div>
                     <div class="card-footer">
                         <button wire:click="store" class=" btn btn-sm btn-primary" type="submit"> Submit</button>
                         <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </div>
