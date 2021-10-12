@extends('layouts.plantilla')


@section('css')
    <style>
        body{
            background-image: url("http://localhost/tamixMultimedios/public/img/fondo2.png");
            background-size: cover;
        }
    </style>
@endsection

@section('title') Nuevo Archivo @endsection

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
$archivo = $formato['archivo'];

$formato_archivo = $formato['formato_archivo'];

$generos = $formato['datos']->generos;
$entidades = $formato['datos']->entidad_federativa;
$lenguas = $formato['datos']->lenguas;
$indices = $formato['datos']->indice_tematico;
$categorias = $formato['datos']->categorias_consulta;

@endphp
<div class="mt-5 d-flex justify-content-center">
	<div class="mt-3">
		<h1 class="h1">Nuevo Archivo</h1>
        <div class="mt-5">
            <img src="{{asset('images/logo2.png')}}" width="150" alt="logo-tvTamix">
        </div>
	</div>


	<div class="col-10">
		<div class="mb-3">
			<form action="{{ route('archivos.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-2">
						<label for="" class="form-label">Clave</label>
						<input type="text" name="clave"
						class="form-control @error('clave') is-invalid @enderror"  required value="{{old('clave')}}">

						@error('clave')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-6">
						<label for="" class="form-label">Titulo Original</label>
						<input type="text" name="titulo_original"
						class="form-control @error('titulo_original') is-invalid @enderror"  required value="{{old('titulo_original')}}">

						@error('titulo_original')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Genero</label>
						<select name="genero" class="form-select @error('genero') is-invalid @enderror" id="genero">
							<option disabled selected value="0">Opciones...</option>
							@foreach($generos as $g)
								@if ($g == old('genero'))
									<option selected value="{{$g}}">{{$g}}</option>
								@else
									<option value="{{$g}}">{{$g}}</option>
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
						<label for="" class="form-label">Duracion</label>
						<time>
							<input type="time" name="duracion"
							class="form-control @error('duracion') is-invalid @enderror"  required value="{{old('duracion')}}" step="0.001">
						</time>
						@error('duracion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Tipo de Archivo</label>
						<select name="tipo_archivo" class="form-select @error('tipo_archivo') is-invalid @enderror" id="tipo_archivo">
							<option disabled selected value="0">Opciones...</option>
							@foreach($archivo as $a)
								@if ($a->tipo == old('tipo_archivo'))
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
						<label for="formato_original" class="form-label">Formato Original</label>
						<select name="formato_original" class="form-select @error('formato_original') is-invalid @enderror" id="formato_original">
							<option disabled selected>Opciones...</option>
							@foreach ($formato_archivo as $a)
								@if ($a->codec_ac != true || $a->codec_bc != true)
									@if ($a->nombre == old('formato_original'))
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
						<select name="codec_ac" id="" class="form-select @error('codec_ac') is-invalid @enderror" id="codec_ac">
							<option disabled selected>Opciones...</option>
							@foreach ($formato_archivo as $a)
								@if ($a->codec_ac)
									@if ($a->nombre == old('codec_ac'))
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
						<input type="text" name="huella_digital_video_ac" class="form-control @error('huella_digital_video_ac') is-invalid @enderror" required value="{{ old('huella_digital_video_ac') }}">
						@error('huella_digital_video_ac')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-2">
						<label for="" class="form-label">Codec Baja Calidad</label>
						<select name="codec_bc" id="codec_bc" class="form-select @error('codec_bc') is-invalid @enderror">
							<option disabled selected>Opciones...</option>
							@foreach ($formato_archivo as $a)
								@if ($a->codec_bc)
									@if ($a->nombre == old('codec_bc'))
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
						<input type="text" name="huella_digital_video_bc"
						class="form-control @error('huella_digital_video_bc') is-invalid @enderror" required value="{{ old('huella_digital_video_bc') }}">
						@error('huella_digital_video_bc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-3">
						<label for="" class="form-label">Fecha de Digitalizacion</label>
						<input type="date" name="fecha_digitalizacion"
						class="form-control @error('fecha_digitalizacion') is-invalid @enderror" required value="{{ old('fecha_digitalizacion') }}">
						@error('fecha_digitalizacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-6">
						<label for="" class="form-label">Fotogramas de Referencia</label>
						<input type="file" multiple name="fotogramas[]"
						class="form-control @error('fotogramas[]') is-invalid @enderror" required id="fotogramas" accept=".jpg, .jpeg, .png" >
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
						<label for="" class="form-label">Realización (realizador)</label>
						<input type="text" name="realizacion"
						class="form-control @error('realizacion') is-invalid @enderror" id="realizacion" required value="{{ old('realizacion') }}">
						@error('realizacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Camarógrafo</label>
						<input type="text" name="camarografo"
						class="form-control @error('camarografo') is-invalid @enderror" required value="{{ old('camarografo') }}">
						@error('camarografo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Asistente de Cámara</label>
						<input type="text" name="asistente_camara"
						class="form-control @error('asistente_camara') is-invalid @enderror" required value="{{ old('asistente_camara') }}">
						@error('asistente_camara')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Sonidista</label>
						<input type="text" name="sonidista"
						class="form-control @error('sonidista') is-invalid @enderror" required value="{{ old('sonidista') }}">
						@error('sonidista')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Investigación</label>
						<input type="text" name="investigacion"
						class="form-control @error('investigacion') is-invalid @enderror" required value="{{ old('investigacion') }}">
						@error('investigacion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Edición</label>
						<input type="text" name="edicion"
						class="form-control @error('edicion') is-invalid @enderror" required value="{{ old('edicion') }}">
						@error('edicion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Posproducción</label>
						<input type="text" name="posproduccion"
						class="form-control @error('posproduccion') is-invalid @enderror" required value="{{ old('posproduccion') }}">
						@error('posproduccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					<div class="col-4">
						<label for="" class="form-label">Producción Ejecutiva</label>
						<input type="text" name="produccion_ejecutiva"
						class="form-control @error('produccion_ejecutiva') is-invalid @enderror" required value="{{ old('produccion_ejecutiva') }}">
						@error('produccion_ejecutiva')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Lugar de Produccion</label>
						<input type="text" name="lugar_produccion"
						class="form-control @error('lugar_produccion') is-invalid @enderror" required value="{{ old('lugar_produccion') }}">
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
								@if ($i == old('anio_produccion'))
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
						<label for="" class="form-label">Entidad Federativa</label>
						<select name="entidad_federativa" class="form-select @error('entidad_federativa') is-invalid @enderror" id="entidad_federativa">
							<option disabled selected>Opciones...</option>
							@foreach($entidades as $e)
								@if ($e == old('entidad_federativa'))
									<option value="{{$e}}" selected>{{$e}}</option>
								@else
									<option value="{{$e}}">{{$e}}</option>
								@endif

							@endforeach
						</select>
						@error('entidad_federativa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-6">
						<label for="" class="form-label">Sinopsis</label>
						<textarea name="sinopsis"
						class="form-control @error('sinopsis') is-invalid @enderror" required>{{old('sinopsis')}}</textarea>
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
						<select name="lengua" class="form-select @error('lengua') is-invalid @enderror" id="lengua">
							<option disabled selected>Opciones...</option>
							@foreach($lenguas as $a)
								@if ($a == old('lengua'))
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
						<select name="indice_tematico" class="form-select @error('indice_tematico') is-invalid @enderror" id="indice_tematico">
							<option disabled selected>Opciones...</option>
							@foreach($indices as $a)
								@if ($a == old('indice_tematico'))
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
						<input type="text" name="personajes_principales"
						class="form-control @error('personajes_principales') is-invalid @enderror" required value="{{ old('personajes_principales') }}">
						@error('personajes_principales')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-4">
						<label for="" class="form-label">Categorias Para Consulta del Material Audiovisual</label>
						<select name="categoria_consulta" class="form-select @error('categoria_consulta') is-invalid @enderror" id="categoria_consulta">
							<option disabled selected>Opciones...</option>
							@foreach($categorias as $a)
								@if ($a == old('categoria_consulta'))
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
						<textarea name="descripcion_general"
						class="form-control @error('descripcion_general') is-invalid @enderror" required>{{old('descripcion_general')}}</textarea>
						@error('descripcion_general')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="col-12 mt-3 text-center">
						<hr class="hr">
						<input type="submit" value="GUARDAR REGISTRO" class="btn btn-info">
						<hr class="hr">
					</div>


				</div>

			</form>
		</div>
	</div>
</div>

@endsection

