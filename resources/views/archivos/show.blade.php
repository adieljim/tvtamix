@extends('layouts.plantilla')

@section('title') Vista Archivo @endsection

@section('css')

<style type="text/css">
    
    @media print{
        #botones {display: none;}
        #imprimible {left: 0%;}
    }

    body{
            background-image: url("/img/fondo2.png");
            background-size: cover;
    }

</style>

@endsection

@section('content')

@php
$archivo = $data['archivo'];
$fotogramas = $archivo->fotogramas;
$ficha = $data['ficha'];
$info= $data['info'];

date_default_timezone_set('America/Mexico_City');
@endphp

<div class="mt-2 row" id="botones">
    <div class="col text-start">
        <a href="{{route('archivos.index')}}" class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
            Atrás
        </a>
    </div>
    <div class="col text-end">
        <a class="btn btn-danger" onClick="javascript:window.print()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
            </svg>
            Imprimir
        </a>
    </div>
</div>

<div class="mt-2">
    <div class="card" id="imprimible">
        <div class="card-header footerBg">
            <div class="row p-3">
                <div class="col-2 text-start">
                    <img src="{{asset('images/logo_tama.png')}}" class="img-thumbnail border-0 bg-transparent" alt="logo-tamazulapam-mixe">
                </div>
                <div class="col text-center">
                    <h1>ACERVO AUDIOVISUAL TAMIX</h1>
                    <h5>{{ date('d/m/Y') }}</h5>
                </div>
                <div class="col-2 text-end">
                    <img src="{{asset('images/logo.png')}}" class="img-thumbnail border-0 bg-transparent" alt="logo-tvTamix">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title"><strong>Archivo.</strong></h5>
                    <hr>
                    <div class="verdana">
                        <strong>Titulo: </strong> {{$archivo->titulo_original}}
                        <strong><br>Clave: </strong> {{ $archivo->clave }}
                        <strong><br>Estado: </strong>{{ $ficha->entidad_federativa }}
                    </div>

                    <hr>
                    <table class="table table-secondary">
                        <tbody>
                            <tr>
                                <td><strong>Genero: <br></strong>{{$archivo->genero}}</td>
                                <td><strong>Tipo de archivo: <br></strong>{{$archivo->tipo_archivo}}</td>
                                <td><strong>Formato original: <br></strong>{{$archivo->formato_original}}</td>

                            </tr>
                            <tr>
                                <td><strong>Codec alta calidad: <br></strong>{{$archivo->codec_ac}}</td>
                                <td colspan="2"><strong>Huella de video(alta calidad): <br></strong>{{$archivo->huella_digital_video_ac}}</td>
                            </tr>
                            <tr>
                                <td><strong>Codec baja calidad: <br></strong>{{$archivo->codec_bc}}</td>
                                <td colspan="2"><strong>Huella de video(baja calidad): <br></strong>{{$archivo->huella_digital_video_bc}}</td>
                            </tr>
                            <tr>
                                <td><strong>Duracion: <br></strong>{{$archivo->duracion}}</td>
                                <td colspan="2"><strong>Digitalización: <br></strong>{{$archivo->fecha_digitalizacion}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="card-title"><strong>Ficha Técnica.</strong></h5>
                    <hr>
                    <table class="table table-secondary">
                        <tbody>
                            <tr>
                                <td><strong>Realización: <br></strong>{{$ficha->realizacion}}</td>
                                <td><strong>Camarográfo: <br></strong>{{$ficha->camarografo}}</td>
                                <td><strong>Asistente de cámara: <br></strong>{{$ficha->asistente_camara}}</td>
                            </tr>
                            <tr>
                                <td><strong>Sonidista: <br></strong>{{$ficha->sonidista}}</td>
                                <td><strong>Investigación: <br></strong>{{$ficha->investigacion}}</td>
                                <td><strong>Edición: <br></strong>{{$ficha->edicion}}</td>
                            </tr>
                            <tr>
                                <td><strong>Posproducción: <br></strong>{{$ficha->posproduccion}}</td>
                                <td><strong>Producción ejecutiva: <br></strong>{{$ficha->produccion_ejecutiva}}</td>
                                <td><strong>Lugar de producción: <br></strong>{{$ficha->lugar_produccion}}</td>
                            </tr>
                            <tr>
                                <td><strong>Año de producción: <br></strong>{{$ficha->anio_produccion}}</td>
                                <td colspan="2"><strong>Sinopsis: <br></strong>{{$ficha->sinopsis}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <h5 class="card-title"><strong>General.</strong></h5>
                    <hr>
                    <table class="table table-secondary">
                        <tbody>
                            <tr>
                                <td><strong>Lengua: <br></strong>{{$info->lengua}}</td>
                                <td colspan="2"><strong>Personajes principales: <br></strong>{{$info->personajes_principales}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Indice Tematico: <br></strong>{{$info->indice_tematico}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Categorias para consulta: <br></strong>{{$info->categoria_consulta}}</td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Descripción general: <br></strong>{{$info->descripcion_general}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h5 class="card-title"><strong>Fotogramas.</strong></h5>
                    <div class="row">
                        @for ($i = 0; $i < count($fotogramas); $i++)
                        <div class="col">
                            <img class="rounded img-thumbnail" width="300" src="{{ route('img', $fotogramas[$i]->nombre ) }}" />
                        </div>
                        @endfor
                    </div>


                </div>
            </div>
        </div>
        <div class="card-footer p-4 text-muted footerBg ">
            <div class="row d-flex align-items-center">
                <div class="col-2 m-auto text-center">
                    <img src="{{asset('images/logo.png')}}" class="img-thumbnail border-0 bg-transparent" alt="logo-tvTamix">
                </div>
                <div class="col text-start">
                    <span class="text-muted">
                        PROYECTO REALIZADO CON EL APOYO DE:
                        <br><strong>INSTITUTO MEXICANO DE CINEMATOGRAFÍA</strong>
                        <br>A TRAVÉS DEL PROGRAMA:
                        <br><strong>FOMENTO AL CINE MEXICANO (FOCINE)</strong>
                    </span>
                </div>
                <div class="col-6 m-auto">
                    <img src="{{asset('images/logos-cultura.png')}}" class="img-thumbnail border-0 bg-transparent" alt="logo-secretariaCultura-imcine-focine">
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
