@extends('layouts.plantilla')

@section('title') Mostrar Archivo @endsection

@section('content')

@php
	$archivo = $data['archivo'];
	$ficha = $data['ficha'];
	$info= $data['info'];
@endphp

<div class="mt-5">
	<a href="{{route('archivos.index')}}" class="btn btn-danger">Regresar</a>
</div>

<div class="mt-5">
	<table class="table table-dark table-borderless">
		<tr class="text-center">
			<th ><h1>Archivo</h1></th>
			<td></td>
		</tr>
		<tr>
			<th>Clave</th>
			<td>{{$archivo->clave}}</td>
		</tr>
		<tr>
			<th>Titulo Original</th>
		    <td>{{$archivo->titulo_original}}</td>
		</tr>
		<tr>
			<th>Serie</th>
			<td>{{$archivo->serie}}</td>
		</tr>
		<tr>
			<th>Genero</th>
			<td>{{$archivo->genero}}</td>
		</tr>
		<tr>
			<th>Duracion</th>
			<td>{{$archivo->duracion}}</td>
		</tr>
		<tr>
			<th>Tipo de Archivo</th>
			<td>{{$archivo->tipo_archivo}}</td>
		</tr>
		<tr>
			<th>Formato Original</th>
			<td>{{$archivo->formato_original}}</td>
		</tr>
		<tr>
			<th>Codec en Alta Calidad</th>
			<td>{{$archivo->codec_ac}}</td>
		</tr>
		<tr>
			<th>Huella Digital De Video En Alta Calidad</th>
			<td>{{$archivo->huella_digital_video_ac}}</td>
		</tr>
		<tr>
			<th>Codec en Baja Calidad</th>
			<td>{{$archivo->codec_bc}}</td>
		</tr>
		<tr>
			<th>Huella Digital De Video En Baja Calidad</th>
			<td>{{$archivo->huella_digital_video_bc}}</td>
		</tr>
		<tr>
			<th>Fecha de Digitalizacion</th>
			<td>{{$archivo->fecha_digitalizacion}}</td>
		</tr>
		<tr>
			<th>Fotogramas</th>
			<td>{{$archivo->fotogramas[0]->nombre}}</td>
		</tr>
		<tr class="text-center">
			<th>Ficha Técnica</th>
            <td></td>
		</tr>
		<tr>
			<th>Fecha de realización</th>
			<td>{{$ficha->fecha_realizacion}}</td>
		</tr>
		<tr>
			<th>Camarografo</th>
			<td>{{$ficha->camarografo}}</td>
		</tr>
		<tr>
			<th>Asistente de Camara</th>
			<td>{{$ficha->asistente_camara}}</td>
		</tr>
		<tr>
			<th>Sonidista</th>
			<td>{{$ficha->sonidista}}</td>
		</tr>
		<tr>
			<th>Investigacion</th>
			<td>{{$ficha->investigacion}}</td>
		</tr>
		<tr>
			<th>Edicion</th>
			<td>{{$ficha->edicion}}</td>
		</tr>
		<tr>
			<th>Posproduccion</th>
			<td>{{$ficha->posproduccion}}</td>
		</tr>
		<tr>
			<th>Produccion Ejecutiva</th>
			<td>{{$ficha->produccion_ejecutiva}}</td>
		</tr>
		<tr>
			<th>Lugar de Produccion</th>
			<td>{{$ficha->lugar_produccion}}</td>
		</tr>
		<tr>
			<th>Año de Produccion</th>
			<td>{{$ficha->anio_produccion}}</td>
		</tr>
		<tr>
			<th>Estado</th>
			<td>{{$ficha->entidad_federativa}}</td>
		</tr>
		<tr>
			<th>Sinopsis</th>
			<td>{{$ficha->sinopsis}}</td>
		</tr>
		<tr class="text-center">
			<th>Informacion General</th>
            <td></td>
		</tr>
		<tr>
			<th>Lengua</th>
			<td>{{$info->lengua}}</td>
		</tr>
		<tr>
			<th>Indice Tematico</th>
			<td>{{$info->indice_tematico}}</td>
		</tr>
		<tr>
			<th>Descripcion General</th>
			<td>{{$info->descripcion_general}}</td>
		</tr>
		<tr>
			<th>Personajes Principales</th>
			<td>{{$info->personajes_principales}}</td>
		</tr>
		<tr>
			<th>Categoria Consulta</th>
			<td>{{$info->categoria_consulta}}</td>
		</tr>
	</table>
</div>




@endsection
