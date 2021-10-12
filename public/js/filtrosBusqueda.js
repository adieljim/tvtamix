window.onload = function () {
    $('#resultados').hide();
};

/*
 **Funcion para mostrar los archivos por indice general.
 **/
$(document).on('change', '#filtro2', function (event) {
    if ($('#filtro2').val() == 'titulo_original') {
        $.ajax({
            url: "{{route('datatable.titulos')}}",
            dataType: 'json',
            success: function (data) {
                showTitulos(data);
            }
        });
    }

    if ($('#filtro2').val() == 'indice_tematico') {
        $.ajax({
            url: "{{route('datatable.indice')}}",
            dataType: 'json',
            success: function (data) {
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
        $('#datosTitles').append("<tr><th>" + data['data'][key].clave + "</th>" + "<td>" + data['data'][key].titulo_original + "</td>" + "<td>" + data['data'][key].sinopsis + "</td></tr>");
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
        $('#datosIndices').append("<tr colspan='3'><th>" + indices[i] + "<th></tr>");
        for (key in dato) {
            if (indices[i] == dato[key].indice_tematico) {
                $('#datosIndices').append("<tr><td>" + "<div class='card'>" + "<div class='card-header'>" + "<h5 class='card-title'>" + dato[key].titulo_original + "</h5>" + "</div>" + "<div class='card-body'>" + "<div class='row'><div class='col-2'>" + dato[key].fotogramas[0].nombre + "</div>" + "<div class='col-10'><p class='card-text'>" + "Clave: " + dato[key].clave + "<br>Sinopsis: " + dato[key].sinopsis + "<br>Indice Temático: " + dato[key].indice_tematico + "</p></div></div>" + "</div>" + "</div>" + "</td></tr>");
            }
        }
    }

    $('#resultados').show();
}
/*
 ** Funcion para mostrar el autocompletado en el tablero de busqueda
 */
$('#buscar').autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "{{route('buscar.archivos')}}",
            dataType: 'json',
            data: {
                term: request.term,
                param: $('#filtro1').val()
            },
            success: function (data) {
                response(data)
            }
        });
    }
});

function formSearch(request) {
    $.ajax({
        url: "{{route('buscar.result')}}",
        dataType: 'json',
        data: {
            term: request.buscar,
            param: request.filtro1
        },
        success: function (data) {
            searchResult(data)
        }
    });
}

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
        $('#datosResults').append("<tr><td class='text-center'> ---> Sin resultados <--- </td></tr>");
    } else {
        if (error == false) {
            $('#titulo0').append("Resultados de '" + $('#buscar').val() + "'. (" + $('#filtro1').val() + ")");
            for (i in archivos) {
                $('#datosResults').append("<tr><td>" + "<div class='card'>" + "<div class='card-header'>" + "<h5 class='card-title'>" + archivos[i].clave + " --- " + archivos[i].titulo_original + "</h5>" + "</div>" + "<div class='card-body'>" + "<div class='row'><div class='col-2'>" + "<img src='http://localhost/tamixMultimedios/storage/app/" + archivos[i].fotogramas + "' width='100px'> " + "</div>" + "<div class='col-10'><p class='card-text'>" + "Personajes Principales: " + archivos[i].personajes_principales + "<br>Sinopsis: " + archivos[i].sinopsis + "<br>Lengua: " + archivos[i].lengua + "<br>Lugar de produccion: " + archivos[i].lugar_produccion + "<br>Año de Produccion: " + archivos[i].anio_produccion + "<br>Estado: " + archivos[i].entidad_federativa + "</p></div></div>" + "</div>" + "</div>" + "</td></tr>");
            }
        }
    }


    $('#resultados').show();
}
