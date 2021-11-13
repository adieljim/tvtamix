@extends('layouts.plantilla')

@section('css')
@endsection

@section('title') Visitante @endsection

@section('header')
<x-header />
@endsection

@section('content')


<div class="mt-3">
    <img src="{{asset('images/titulo.png')}}" alt="titulo-memoria-audiovisual-tamix" class="img-thumbnail border-0 bg-transparent">
</div>
<div class="my-3">
    <a href="{{route('inicio')}}" class="btn btn-dark">Ver catálogo</a>
</div>

@endsection

@section('footer')
<x-footer />
@endsection

@section('js')
@endsection
