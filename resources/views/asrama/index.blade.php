@extends('dashboard.base')

@section('content')
@livewire('asrama.index')


@endsection
@section('css')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
@endsection

@section('javascript')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('/js/app.js') }}"></script>





@endsection
