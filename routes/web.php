<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use sicaab\Http\Controllers\MessagesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Rutas Módulo Comercial
Route::resource('comercial/clientes','ClientesController');
Route::resource('comercial/artes', 'ArteProductoController');
Route::resource('comercial/proveedores', 'ProveedoresController');
Route::resource('comercial/productos', 'ProductosController');
Route::resource('comercial/orden_compra','OrdenCompraController');

//Rutas Módulo Almacén y Logística
Route::resource('almacen/materiales', 'MaterialController');
Route::resource('almacen/requerimiento_compra', 'RequerimientoInternoController');

//Produccion
Route::resource('produccion/ficha_tecnica', 'FichaTecnicaController');


//Rutas excel
Route::get('clientes/export', 'ClientesController@export');
Route::get('proveedores/export', 'ProveedoresController@export');
Route::post('comercial/clientes', 'ClientesController@import');
Route::get('materiales/export','MaterialController@export');
Route::post('almacen/materiales', 'MaterialController@import');


//Rutas pdf
Route::get('clientes/pdf', 'ClientesController@createPDF');
Route::get('requerimiento_compra/pdf', 'RequerimientoInternoController@createPDF');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('materiales/pdf', 'MaterialController@createPDF');


    //rutas correo
    Route::view('/contact', 'contact/contact')->name('contact');
    Route::post('contact', [MessagesController::class, 'store']);
