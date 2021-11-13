@extends('layouts.plantilla')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}">
@endsection

@section('title') Inicio @endsection

@section('header')
<x-header />
@endsection

@section('content')

<div class="container">
    @if(Auth::user())
    <div class="mt-1 row">
        <div class="col text-center">
            <a href="{{ route('excel') }}" class="btn btn-success btn-lg mb-3">
                <img src="{{ asset('storage/img/iconos/excel.png') }}" width="25" />
                Exportar Base de Datos
            </a>
        </div>
    </div>
    @endif


    <div class="mt-1 row ">
        <div class="col-4">
            <div class="card bg-secondary text-light">
                <div class="card-header">{{ __('Filtros') }}</div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 input-group">
                                    <label for="" class="form-label">Mostrar registros por:.</label>
                                    <select class="form-select" name="filtro2" id="filtro2">
                                        <option selected disabled>Opciones...</option>
                                        <option value="titulo_original">Título</option>
                                        <option value="indice_tematico">Índice Temático</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-8">
            <div class="card bg-dark text-light">
                <div class="card-header">{{ __('Tablero De Búsqueda') }}</div>

                <div class="card-body">
                    <form id="buscarForm" action="javascript: formSearch(this);">
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3 input-group">
                                    <label for="" class="form-label">Busca por:.</label>
                                    <select class="form-select" name="filtro1" id="filtro1">
                                        <option value="titulo_original">Título</option>
                                        <option value="personajes_principales">Personaje</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-8">

                                <div class="mb-3 input-group">
                                    <input class="form-control" type="text" placeholder="Cuadro de Búsqueda" name="buscar" id="buscar" aria-label="Search">
                                    <button class="btn btn-light" type="submit" id="button-addon2">
                                        <img src="{{asset('storage/img/iconos/buscar.png')}}" width="20px">
                                    </button>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>

    <div class="mt-3" id="resultados">

        <div class="card" id="busqueda">
            <div class="card-header text-center">
                <h2 id="titulo0"></h2>
            </div>
            <div class="card-body" id="search">
                <table class="table" id="tableResults">
                    <tbody id="datosResults">
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card" id="titulos">
            <div class="card-header text-center">
                <h2 id="titulo1"></h2>
            </div>
            <div class="card-body">
                <table class="table" id="tableTitles">
                    <thead>
                        <tr>
                            <th scope="col">Clave</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Sinopsis</th>
                        </tr>
                    </thead>
                    <tbody id="datosTitles">
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card" id="indices">
            <div class="card-header text-center">
                <h2 id="titulo2"></h2>
            </div>
            <div class="card-body">
                <table class="table" id="tableIndices">
                    <tbody id="datosIndices">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
@section('js')
<script type="text/javascript" src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#resultados').hide();
    });

    /*
     **Funcion para mostrar los archivos por indice general.
     **/
    $(document).on('change', '#filtro2', function(event) {
        if ($('#filtro2').val() == 'titulo_original') {
            $.ajax({
                url: "{{route('datatable.titulos')}}"
                , dataType: 'json'
                , success: function(data) {
                    showTitulos(data);
                }
            });
        }

        if ($('#filtro2').val() == 'indice_tematico') {
            $.ajax({
                url: "{{route('datatable.indice')}}"
                , dataType: 'json'
                , success: function(data) {
                    showIndices(data);
                }
            });
        }

    });

    function showTitulos(data) {
        $('#indices').hide();
        $('#busqueda').hide();
        $('#titulos').show();

        $('#titulo1').empty();
        $('#datosTitles').empty();
        $('#titulo1').append("Presentación por indice general.");

        for (key in data['data']) {
            $('#datosTitles')
                .append(
                    "<tr><th>" + data['data'][key].clave + "</th>" +
                    "<td>" + data['data'][key].titulo_original + "</td>" +
                    "<td>" + data['data'][key].sinopsis + "</td></tr>"
                );
        }
        $('#resultados').show();
    }

    function showIndices(data) {
        $('#titulos').hide();
        $('#busqueda').hide();
        $('#indices').show();

        $('#titulo2').empty();
        $('#datosIndices').empty();
        $('#titulo2').append("Presentación por indice temático.");
        var indices = data['indices'];
        var dato = data['data']
        for (i in indices) {
            $('#datosIndices').append(
                "<tr colspan='3'><th>" + indices[i] + "<th></tr>"
            );
            for (key in dato) {
                if (indices[i] == dato[key].indice_tematico) {
                    $('#datosIndices').append(
                        "<tr><td>" +
                        "<div class='card'>" +
                            "<div class='card-header'>" +
                            "<h5 class='card-title'>" + dato[key].titulo_original + "</h5>" +
                            "</div>" +
                            "<div class='card-body'>" +
                            "<div class='row'>" + 
                                "<div class='col-6'><p class='card-text'>" +
                                    "<strong>Clave: </strong>" + dato[key].clave +
                                    "<br><strong>Sinopsis: </strong>" + dato[key].sinopsis +
                                    "<br><strong>Indice Temático: </strong>" + dato[key].indice_tematico +
                                    "</p></div><div class='col-6 text-center'>" +
                                    "<strong>Fotogramas:</strong><br>" +
                                "<div class='row' id='fotogramas"+key+"'>" +                         
                            "</div></div></div></div>" +
                            "</div>" +
                        "</div>" +
                        "</td></tr>"
                    );                 
                    for (var j = 0; j < dato[key].fotogramas.length; j++) {                        
                        $('#fotogramas'+key).append(
                            "<img src='/storage/fotogramas/" + dato[key].fotogramas[j].nombre + "' class='col img-thumbnail'> "
                        );                        
                    }
                }
            }
        }

        $('#resultados').show();
    }
    /*
     ** Funcion para mostrar el autocompletado en el tablero de busqueda
     */
    $('#buscar').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{route('buscar.archivos')}}"
                , dataType: 'json'
                , data: {
                    term: request.term
                    , param: $('#filtro1').val()
                , }
                , success: function(data) {
                    response(data)
                }
            });
        }
    });

    function formSearch(request) {
        $.ajax({
            url: "{{route('buscar.result')}}"
            , dataType: 'json'
            , data: {
                term: request.buscar.value
                , param: request.filtro1.value
            }
            , success: function(data) {
                searchResult(data)
            }
        });
    };

    function searchResult(data) {
        $('#titulos').hide();
        $('#busqueda').show();
        $('#indices').hide();

        $('#titulo0').empty();
        $('#datosResults').empty();

        archivos = data['archivo'];
        error = data['error'];

        if (data['archivo'].length == 0) {
            $('#titulo0').append("Resultados de '" + $('#buscar').val() + "'. (" + $('#filtro1').val() + ")");
            $('#datosResults').append(
                "<tr><td class='text-center'> ---> Sin resultados <--- </td></tr>"
            );
        } else {
            if (error == false) {
                $('#titulo0').append("Resultados de '" + $('#buscar').val() + "'. (" + $('#filtro1').val() + ")");
                for (i in archivos) {
                    $('#datosResults').append(
                        "<tr><td>" +
                        "<div class='card'>" +
                        "<div class='card-header'>" +
                        "<h5 class='card-title'><strong>" + archivos[i].clave + " | " + archivos[i].titulo_original + "</strong></h5>" +
                        "</div>" +
                        "<div class='card-body text-start'>" +
                        "<div class='row'>"+
                        "<div class='col-7'><p  class='card-text'>" +
                        "<strong>Personajes Principales</strong>: " + archivos[i].personajes_principales +
                        "<br><strong>Sinopsis: </strong>" + archivos[i].sinopsis +
                        "<br><strong>Lengua: </strong>" + archivos[i].lengua +
                        "<br><strong>Lugar de produccion: </strong>" + archivos[i].lugar_produccion +
                        "<br><strong>Año de Produccion: </strong>" + archivos[i].anio_produccion +
                        "<br><strong>Estado: </strong>" + archivos[i].entidad_federativa +
                        "</p></div>" +
                        "<div class='col-5 text-center'>" + 
                        "<strong>Fotogramas:</strong><br>" +
                        "<div class='row' id='fotos"+i+"'>" + 
                        "</div></div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</td></tr>"
                    );
                    for (var j = 0; j < archivos[i].fotogramas.length; j++) {                        
                        $('#fotos'+i).append(
                            "<img src='/storage/fotogramas/" + archivos[i].fotogramas[j].nombre + "' class='col img-thumbnail'> "
                        );                        
                    }
                }
            }
        }


        $('#resultados').show();
    }

</script>
@endsection
