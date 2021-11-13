<table>
	<thead>
		<tr>
			<th><strong>Titulo</strong></th>
			<th><strong>Clave</strong></th>
			<th><strong>Estado</strong></th>
			<th><strong>Genero</strong></th>
			<th><strong>Tipo de Archivo</strong></th>
			<th><strong>Formato original</strong></th>
			<th><strong>Codec alta calidad</strong></th>
			<th><strong>Huella de video (alta calidad)</strong></th>
			<th><strong>Codec baja calidad</strong></th>
			<th><strong>Huella de video (baja calidad)</strong></th>			
			<th><strong>Duracion</strong></th>
			<th><strong>Digitalizacion</strong></th>
			<th><strong>Realizacion</strong></th>
			<th><strong>Camarografo</strong></th>
			<th><strong>Asistente de cámara</strong></th>
			<th><strong>Sonidista</strong></th>
			<th><strong>Investigación</strong></th>
			<th><strong>Edición</strong></th>
			<th><strong>Posproducción</strong></th>
			<th><strong>Producción ejecutiva</strong></th>
			<th><strong>Lugar de producción</strong></th>
			<th><strong>Año de producción</strong></th>
			<th><strong>Sinopsis</strong></th>
			<th><strong>Lengua</strong></th>
			<th><strong>Personajes Principales</strong></th>
			<th><strong>Indice Tematico</strong></th>
			<th><strong>Categoria para consulta</strong></th>
			<th><strong>Descripcion General</strong></th>		
		</tr>
	</thead>
		@foreach($archivos as $a)

			<tr>
				<td>{{$a->titulo_original}}</td>
				<td>{{$a->clave}}</td>
				<td>{{$a->entidad_federativa}}</td>
				<td>{{$a->genero}}</td>
				<td>{{$a->tipo_archivo}}</td>
				<td>{{$a->formato_original}}</td>
				<td>{{$a->codec_ac}}</td>
				<td>{{$a->huella_digital_video_ac}}</td>
				<td>{{$a->codec_bc}}</td>
				<td>{{$a->huella_digital_video_bc}}</td>
				<td>{{$a->duracion}}</td>
				<td>{{$a->fecha_digitalizacion}}</td>
				<td>{{$a->realizacion}}</td>
				<td>{{$a->camarografo}}</td>
				<td>{{$a->asistente_camara}}</td>
				<td>{{$a->sonidista}}</td>
				<td>{{$a->investigacion}}</td>
				<td>{{$a->edicion}}</td>
				<td>{{$a->posproduccion}}</td>
				<td>{{$a->produccion_ejecutiva}}/td>
				<td>{{$a->lugar_produccion}}</td>
				<td>{{$a->anio_produccion}}</td>
				<td>{{$a->sinopsis}}</td>
				<td>{{$a->lengua}}</td>
				<td>{{$a->personajes_principales}}</td>
				<td>{{$a->indice_tematico}}</td>
				<td>{{$a->categoria_consulta}}</td>
				<td>{{$a->descripcion_general}}</td>
			</tr>

		@endforeach
	<tbody>
	</tbody>
</table>