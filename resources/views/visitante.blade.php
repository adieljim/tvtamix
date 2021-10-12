@extends('layouts.plantilla')

@section('css')
@endsection

@section('header')
<x-header />
@endsection

@section('content')


<div class="mt-3">
    <img src="{{asset('images/titulo.png')}}" alt="titulo-memoria-audiovisual-tamix">
</div>
<div class="m-2">
    <a href="{{route('inicio')}}" class="btn btn-dark">Ver catálogo</a>
</div>

@endsection

@section('footer')
<x-footer />
@endsection

@section('js')
@endsection
