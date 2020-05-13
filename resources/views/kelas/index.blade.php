@extends('dashboard.base')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-12">

                @livewire('kelas.index')

            </div>
        </div>
    </div>
</div>
@endsection

@section('css')

@livewireStyles

@endsection


@section('javascript')

@livewireScripts

@endsection
