<?php

use App\Exports\ArchivosExport;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BuscarController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\GeneraPDFController;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function(){
	return view('portada');
})->name('portada');

Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');

/*
** Rutas del CRUD de manejo del catalogo
*/
Route::resource('archivos', ArchivoController::class)->middleware('auth');

/*
** Rutas de Autentificacion (Login,Logout,etc...)
*/
Auth::routes();

/*
** Rutas de exportacion a PDF
*/
Route::get('pdf/{id}', [GeneraPDFController::class, 'showPDF'])->name('imprimePDF')->middleware('auth');

/*
** Rutas de búsqueda...
*/
Route::get('buscar/archivos', [BuscarController::class,'autocompletaBusqueda'])->name('buscar.archivos');

Route::get('buscar/archivos/result', [BuscarController::class,'buscar'])->name('buscar.result');

/*
** Ruta de muestra de catálogo a visitantes
*/
Route::post('/visitantes/consulta_digital', [VisitanteController::class, 'visitante'])->name('visitantes.consulta_digital');

/*
 * Mandar por ajax los archivos
 */
Route::get('datatable/archivos', [DatatableController::class, 'archivos'])->name('datatable.archivos');
/**
 * Retornar todos los titulos
 */
Route::get('datatable/titulos', [DatatableController::class, 'showTitulos'])->name('datatable.titulos');
/**
 * * Retornar por indice tematico
 */
Route::get('datatable/indice', [DatatableController::class, 'showIndiceTematico'])->name('datatable.indice');

/**
 * Ruta para mostrar imagenes
 */

Route::get('img/{src}', function($src){
    return Storage::response('public/fotogramas/'.$src);
})->name('img');

/**
 * Exportar a excel Ruta
 */

Route::get('excel', function(){
    return (new ArchivosExport)->download('archivos.xlsx');
})->name('excel');
