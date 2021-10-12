@extends('layouts.plantilla')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('js/DataTables/DataTables-1.11.2/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('js/DataTables/responsive/css/responsive.bootstrap5.min.css') }}">
@endsection

@section('header')
<x-header />
@endsection

@section('content')

<div class="mt-3 row">
    <div class="col text-start">
        <a href="{{ route('archivos.create') }}" class="btn btn-success btn-lg mb-3">
            Nuevo Archivo
        </a>
    </div>
    <div class="col text-end">
        <a href="{{ route('excel') }}" class="btn btn-secondary btn-lg mb-3">
            <img src="{{ asset('storage/img/iconos/excel.png') }}" width="25" />
            Exportar
        </a>
    </div>
</div>

<div class="mt-2 card bg-dark text-light">
    <div class="card-body" id="datatable">
        <table class="table table-dark table-striped display" id="archivos" width="100">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Titulo Original</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Creado</th>
                    <th scope="col">Actualizado</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Borrar</th>
                </tr>
            </thead>
        </table>
    </div>

</div>

@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/DataTables/DataTables-1.11.2/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/DataTables/responsive/js/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/DataTables/responsive/js/responsive.bootstrap5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        var table = $('#archivos').DataTable({
            responsive: true
            , autoWidth: false
            , "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página."
                , "zeroRecords": "Nada encontrado - disculpa :("
                , "info": "Mostrando la página _PAGE_ de _PAGES_"
                , "infoEmpty": "Sin registros"
                , "infoFiltered": "(filtrado de _MAX_ registros totales)."
                , "search": "Buscar:"
                , "paginate": {
                    'next': 'Siguiente &raquo;'
                    , 'previous': '&laquo; Anterior'
                }
            }
            , "ajax": "{{ route('datatable.archivos') }}"
            , "columns": [{
                    "data": 'id'
                }
                , {
                    "data": 'clave'
                }
                , {
                    "data": 'titulo_original'
                }
                , {
                    "data": 'genero'
                }
                , {
                    "data": 'created_at'
                }
                , {
                    "data": 'updated_at'
                }
                , {
                    "data": 'ver'
                }
                , {
                    "data": 'editar'
                }
                , {
                    "data": 'eliminar'
                }
            ]
        });
    });

    $(document).on("click", "#del", function(event) {
        return confirm('¿Está seguro que desea eliminar ese registro?');
    });

</script>

@endsection
