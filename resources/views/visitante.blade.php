@extends('layouts.plantilla')

@section('css')
@endsection

@section('content')


	<div class="mt-3">

        <h1>
            Bienvenido {{ $visitante['name'].' '. $visitante['apellidos'] }}
            <img src="{{asset('storage/img/iconos/tour-guide.png')}}" width="50px">
        </h1>
        <img src="{{asset('images/titulo.png')}}" alt="titulo-memoria-audiovisual-tamix">
    </div>

@endsection

@section('footer')
    <x-footer/>
@endsection

@section('js')
@endsection
