@extends('layouts.plantilla')

@section('title') Editar Archivo @endsection

@section('css')
    <style>
        body{
            background-image: url("/img/fondo2.png");
            background-size: cover;
        }
    </style>
@endsection

@section('header')
    <x-header/>
@endsection

@section('content')

<script type="text/javascript">
	$(document).on('change', '#tipo_archivo', function(event) {
     	muestraElementoTipo($("#tipo_archivo option:selected").val());
	});
	window.onload = function ocultaTipos(){
		$('.oculta').hide(0);
	};
	function muestraElementoTipo(tipo){
		$('.oculta').hide(0);
		var elemento = "." + tipo;
		$(elemento).show(0);
	}
</script>

@php
	$archivo = $data['archivo'];
	$ficha = $data['ficha'];
	$info= $data['info'];

	$tipo = $data['tipo'];
	$formato = $data['formato'];

	$generos = $data['datos']->generos;
	$entidades = $data['datos']->entidad_federativa;
	$lenguas = $data['datos']->lenguas;
	$indices = $data['datos']->indice_tematico;
	$categorias = $data['datos']->categorias_consulta;
@endphp

<div class="mt-5 d-flex justify-content-center">

	<div class="mt-3">
		<h1 class="">Editar Archivo</h1>
        <div class="mt-5">
            <img src="{{asset('images/logo2.png')}}" width="150" alt="logo-tvTamix">
        </div>
	</div>

	<div class="col-10 mb-5">
		<div class="mb-5">
			<form action="{{ route('archivos.update', $archivo) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="row">

					<div class="col-2">
						<label for="" class="form-label">Clave</label>
						<input type="text" name="clave" class="form-control" value="{{ $archivo->clave }}" disabled>
					</div>
					<div class="col-6">
						<label for="" class="form-label">Titulo Original</label>
						<input type="text" class="form-control @error('titulo_original') is-invalid @enderror" name="titulo_original" value="{{ $archivo->titulo_original }}" required>

						@error('titulo_original')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Género</label>
						<select name="genero" class="form-select @error('genero') is-invalid @enderror" id="genero" required>
							<option disabled>Opciones...</option>
							@foreach($generos as $a)
								@if ($a == $archivo->genero)
									<option selected value="{{$a}}">{{$a}}</option>
								@else
									<option value="{{$a}}">{{$a}}</option>
								@endif

							@endforeach
						</select>
						@error('genero')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Duracion <dfn>(minutos).<dfn></label>
						<input type="number" name="duracion" min="1" max="1000" class="form-control @error('duracion') is-invalid @enderror"  required value="{{ $archivo->duracion }}">
						@error('duracion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Tipo de Archivo</label>
						<select name="tipo_archivo" class="form-select @error('tipo_archivo') is-invalid @enderror"  id="tipo_archivo" required>
							<option disabled >Opciones...</option>
							@foreach($tipo as $a)
								@if ($a->tipo == $archivo->tipo_archivo)
									<option selected value="{{$a->tipo}}">{{$a->tipo}}</option>
								@else
									<option value="{{$a->tipo}}">{{$a->tipo}}</option>
								@endif
							@endforeach
						</select>
						@error('tipo_archivo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Formato Original</label>
						<select name="formato_original" class="form-select @error('formato_original') is-invalid @enderror" id="formato_original"  required>
							<option disabled>Opciones...</option>

							@foreach ($formato as $a)
								@if ($a->codec_ac != true or $a->codec_bc != true)
									@if ($a->nombre ==  $archivo->formato_original)
										<option selected class="{{$a->tipo_archivo}} oculta" value="{{$a->nombre}}">{{$a->nombre}}</option>
									@else
										<option class="{{$a->tipo_archivo}} oculta" value="{{$a->nombre}}">{{$a->nombre}}</option>
									@endif
								@endif
							@endforeach
						</select>
						@error('formato_original')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-2">
						<label for="" class="form-label">Codec Alta Calidad</label>
						<select name="codec_ac" id="codec_ac" class="form-select @error('codec_ac') is-invalid @enderror" value="{{ $archivo->codec_ac }}" required>
							<option disabled >Opciones...</option>
							@foreach ($formato as $a)
								@if ($a->codec_ac)
									@if ($a->nombre ==  $archivo->codec_ac)
										<option selected class="{{$a->tipo_archivo}} oculta" value="{{$a->nombre}}">{{$a->nombre}}</option>
									@else
										<option class="{{$a->tipo_archivo}} oculta" value="{{$a->nombre}}">{{$a->nombre}}</option>
									@endif
								@endif
							@endforeach
						</select>
						@error('codec_ac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Huella Digital Del Video En Alta Calidad</label>
						<input type="text" name="huella_digital_video_ac" class="form-control @error('huella_digital_video_ac') is-invalid @enderror" value="{{ $archivo->huella_digital_video_ac }}" id="huella_digital_video_ac" required>
						@error('huella_digital_video_ac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-2">
						<label for="" class="form-label">Codec Baja Calidad</label>
						<select name="codec_bc" id="codec_bc" class="form-select @error('codec_bc') is-invalid @enderror" value="{{ $archivo->codec_bc }}" required>
							<option disabled selected>Opciones...</option>
							@foreach ($formato as $a)
								@if ($a->codec_bc)
									@if ($a->nombre ==  $archivo->codec_bc)
										<option selected class="{{$a->tipo_archivo}} oculta" value="{{$a->nombre}}">{{$a->nombre}}</option>
									@else
										<option class="{{$a->tipo_archivo}} oculta" value="{{$a->nombre}}">{{$a->nombre}}</option>
									@endif
								@endif
							@endforeach
						</select>
						@error('codec_bc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Huella Digital Del Video En Baja Calidad</label>
						<input type="text" name="huella_digital_video_bc" class="form-control @error('huella_digital_video_bc') is-invalid @enderror" value="{{ $archivo->huella_digital_video_bc }}" id="huella_digital_video_bc" required>
						@error('huella_digital_video_bc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-3">
						<label for="" class="form-label">Fecha de Digitalizacion</label>
						<input type="date" name="fecha_digitalizacion" class="form-control @error('fecha_digitalizacion') is-invalid @enderror" value="{{ $archivo->fecha_digitalizacion }}" required>
						@error('fecha_digitalizacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-6">
						<label for="" class="form-label">Fotogramas de Referencia</label>
						<input type="file" name="fotogramas[]" multiple class="form-control @error('fotogramas[]') is-invalid @enderror" id="fotogramas[]" accept=".jpg, .jpeg, .png">
						@error('fotogramas[]')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-12">
						<hr class="hr">
						<h2>Ficha Tecnica</h2>
					</div>

					<div class="col-4">
						<label for="" class="form-label">Realización</label>
						<input type="text" name="realizacion" class="form-control @error('realizacion') is-invalid @enderror" id="realizacion" value="{{ $ficha->realizacion }}" required>
						@error('realizacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Camarógrafo</label>
						<input type="text" name="camarografo" class="form-control @error('camarografo') is-invalid @enderror" value="{{ $ficha->camarografo }}" required>
						@error('camarografo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Asistente de Cámara</label>
						<input type="text" name="asistente_camara" class="form-control @error('asistente_camara') is-invalid @enderror" value="{{ $ficha->asistente_camara }}" required>
						@error('asistente_camara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Sonidista</label>
						<input type="text" name="sonidista" class="form-control @error('sonidista') is-invalid @enderror" value="{{ $ficha->sonidista }}" required>
						@error('sonidista')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Investigación</label>
						<input type="text" name="investigacion" class="form-control @error('investigacion') is-invalid @enderror" value="{{ $ficha->investigacion }}" required>
						@error('investigacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Edición</label>
						<input type="text" name="edicion" class="form-control @error('edicion') is-invalid @enderror" value="{{ $ficha->edicion }}" required>
						@error('edicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Posproducción</label>
						<input type="text" name="posproduccion" class="form-control @error('posproduccion') is-invalid @enderror" value="{{ $ficha->posproduccion }}" required>
						@error('posproduccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Producción Ejecutiva</label>
						<input type="text" name="produccion_ejecutiva" class="form-control @error('produccion_ejecutiva') is-invalid @enderror" value="{{ $ficha->produccion_ejecutiva }}" required>
						@error('produccion_ejecutiva')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Lugar de Produccion</label>
						<input type="text" name="lugar_produccion" class="form-control @error('lugar_produccion') is-invalid @enderror" value="{{ $ficha->lugar_produccion }}" required>
						@error('lugar_produccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Año de Produccion</label>
						<select name="anio_produccion" class="form-select @error('anio_produccion') is-invalid @enderror">
							<option disabled selected>Seleccione un año...</option>
							@for ($i = 1980; $i <= 2080; $i++)
								@if ($i == $ficha->anio_produccion || $i == old('anio_produccion'))
									<option selected value="{{$i}}">{{$i}}</option>
								@else
									<option value="{{$i}}">{{$i}}</option>
								@endif
							@endfor
						</select>
						@error('anio_produccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="localidad" class="form-label">Localidad o Municipio</label>
						<input id="localidad" type="text" name="localidad" class="form-control @error('personajes_principales') is-invalid @enderror" required value="{{ $ficha->localidad }}">
						@error('localidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-6">
						<label for="" class="form-label">Sinopsis</label>
						<textarea name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" required>{{ $ficha->sinopsis }}</textarea>
						@error('sinopsis')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-12">
						<hr class="hr">
						<h2>General</h2>
					</div>

					<div class="col-4">
						<label for="" class="form-label">Lengua</label>
						<select name="lengua" class="form-select @error('lengua') is-invalid @enderror" id="lengua" required>
							<option disabled >Opciones...</option>
							@foreach($lenguas as $a)
								@if ($a == $info->lengua)
									<option selected value="{{$a}}">{{$a}}</option>
								@else
									<option value="{{$a}}">{{$a}}</option>
								@endif

							@endforeach
						</select>
						@error('lengua')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">(Serie) Indice Tematico</label>
						<select name="indice_tematico" class="form-select @error('indice_tematico') is-invalid @enderror" id="indice_tematico" required>
							<option disabled value="0">Opciones...</option>
							@foreach($indices as $a)
								@if ($a == $info->indice_tematico)
									<option selected value="{{$a}}">{{$a}}</option>
								@else
									<option value="{{$a}}">{{$a}}</option>
								@endif
							@endforeach
						</select>
						@error('indice_tematico')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Personajes Principales</label>
						<input type="text" name="personajes_principales" class="form-control @error('personajes_principales') is-invalid @enderror" id="categoria_consulta" value="{{ $info->personajes_principales }}" required>
						@error('personajes_principales')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Categorias Para Consulta del Material Audiovisual</label>
						<select name="categoria_consulta" class="form-select @error('categoria_consulta') is-invalid @enderror" id="categoria_consulta" required>
							<option disabled>Opciones...</option>
							@foreach($categorias as $a)
								@if ($a == $info->categoria_consulta)
									<option selected value="{{$a}}">{{$a}}</option>
								@else
									<option value="{{$a}}">{{$a}}</option>
								@endif
							@endforeach
						</select>
						@error('categoria_consulta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-6">
						<label for="" class="form-label">Descripcion General</label>
						<textarea name="descripcion_general" class="form-control @error('descripcion_general') is-invalid @enderror" required> {{ $info->descripcion_general }}</textarea>
						@error('descripcion_general')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-12 mt-3 text-center">
						<hr class="hr">
						<input type="submit" value="ACTUALIZAR REGISTRO" class="btn btn-info">
						<hr class="hr">
					</div>

				</div>

			</form>
		</div>
	</div>
</div>

@endsection
