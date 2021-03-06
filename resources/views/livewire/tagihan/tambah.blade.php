<div class="card">
    <div class="card-header"><strong>Tambah</strong> Rincian Tagihan</div>
    <div class="card-body">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Periode Pembayaran</label>
            <div class="col-md-9">
                <select class="form-control  @error('periode') is-invalid @enderror" wire:model="periode">
                    <option value=''>pilih salah satu</option>
                    <option value="spp">bulanan</option>
                    <option value="cicilan">Cicilan</option>
                </select>
                @error('periode')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Tanggal Jatuh Tempo</label>
            <div class="col-md-9">
                @if($periode == "spp" )
                <input wire:model="tempo" class="form-control @error('tempo') is-invalid @enderror" min="1" max="29" id="number-input" type="number" name="text-input">
                @elseif ($periode == "cicilan" )
                <input wire:model="tempo" class="form-control @error('tempo') is-invalid @enderror" id="date-input" type="date" name="date-input" placeholder="date">
                @endif
                @error('tempo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>


        <div class="form-group row">
            <label class="col-md-3 col-form-label">Jenis Pembayaran</label>
            <div class="col-md-9">

                <select class="form-control @error('jenis') is-invalid @enderror" wire:model="jenis">
                    <option value=''>pilih salah satu</option>
                    @foreach ($dataJenis as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>

                    @endforeach

                </select>
                @error('jenis') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 col-form-label">biaya</label>
            <div class="col-md-9">
                <input wire:model="biaya" class="form-control @error('biaya') is-invalid @enderror" id="text-input" type="number" name="text-input">
                @error('biaya') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                <!--
                 <div class="form-check form-check-inline mr-1">
                     <input wire:model="select" class="form-check-input" id="inline-radio3" type="radio" value="3" name="inline-radios">
                     <label class="form-check-label" for="inline-radio3">Asrama</label>
                 </div>
                 -->
                <div class="form-check form-check-inline mr-1">
                    <input wire:model="select" class="form-check-input" id="inline-radio4" type="radio" value="4" name="inline-radios">
                    <label class="form-check-label" for="inline-radio4">Custom</label>
                </div>
            </div>
        </div>

        @if($select == 2)

        <div class="form-group row @if($select == 2)   @else d-none  @endif" @if($select==2) wire:ignore @endif>
            <label class="col-md-3 col-form-label">kelas</label>
            <div class="col-md-9">

                <select class="form-control kelas" id="kelas" multiple="multiple">
                    <option value=''>pilih salah satu</option>
                    @foreach ($DataSelect as $data)

                    <option value="{{$data->id}}">{{$data->tingkat}} - {{$data->kelas}}</option>

                    @endforeach

                </select>
                @error('kelas') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        @elseif($select == 3)

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Asrama</label>
            <div class="col-md-9">

                <select class="form-control select2" multiple="multiple">
                    <option value=''>pilih salah satu</option>
                    @foreach ($DataSelect as $data)

                    <option value="{{$data->id}}">{{$data->nama}}</option>

                    @endforeach

                </select>
                @error('kelas') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        @elseif($select == 4)

        <div class="form-group row">
            <label class="col-md-3 col-form-label">Custom</label>

            <div class="col-md-9">
                <a class="btn btn-link" href="{{asset('public/'.'default/customtagihan.xlsx')   }}">format file</a>
                <input type="file" class="form-control-file" wire:model="file">
                @error('kelas') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>


        @else
        @endif










    </div>
    <div class="card-footer">
        <button wire:click="tambah" class=" btn btn-sm btn-primary" type="submit">
            <div wire:loading wire:target="tambah">
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            </div>
            Submit
        </button>
        <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
    </div>
</div>

@section('css')
<link href="{{ asset('css/backand.css') }}" rel="stylesheet">
@endsection

@push('scripts')
<script src="{{ asset('js/backand.js') }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

    })


    window.livewire.on('select', () => {

        $('#kelas').select2();
        $('.kelas').on('change', function(e) {
            var data = $('.kelas').select2("val");
            @this.set('kelas', data);
        });

    })
</script>
@endpush