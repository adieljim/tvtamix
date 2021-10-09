@extends('layouts.plantilla')

@section('css')
@endsection

@section('content')

@guest



    <div class="mt-5 row justify-content-center">

        <div class="col-5">
            <div class="text-center">
                <img src="{{asset('storage/img/iconos/tour-guide.png')}}" width="100px">
            </div>

            <div class="card bg-secondary text-light">
                <div class="card-header text-center">
                    <h3>Entrar como visitante:</h3>
                </div>
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('visitantes.consulta_digital') }}">
                        @csrf

                        <div class="mb-3 row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="apellidos" class="col-md-3 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control" name="apellidos" required autocomplete="apellidos" autofocus>
                            </div>
                        </div>

                        <div class="mb-3 row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Entrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    
    <div class="m-1">
        <div>
            <img src="{{asset('images/titulo.png')}}" alt="titulo-memoria-audiovisual-tamix">
        </div>
        <div class="m-2">
            <a href="{{route('archivos.create')}}" class="btn btn-dark">Capturar archivo</a>
            <a href="{{route('archivos.index')}}" class="btn btn-dark">Ver Archivos</a>
            <a href="{{route('inicio')}}" class="btn btn-dark">Buscar</a>
        </div>
    </div>

@endguest



@endsection



@section('footer')
    <x-footer/>
@endsection
