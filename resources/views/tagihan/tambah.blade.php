@extends('dashboard.base')

@section('css')
<link href="{{ asset('css/backand.css') }}" rel="stylesheet">
@endsection

@push('scripts')
<script src="{{ asset('js/backand.js') }}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {

        $('.kelas').select2();




    })
</script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">

                @livewire('tagihan.tambah')

            </div>
        </div>
    </div>
</div>
@endsection