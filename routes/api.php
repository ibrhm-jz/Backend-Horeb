<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'Login@login');

//---------------------Users-------------------
Route::post('/registro', 'UsersController@register');
Route::get('/user/{id}', 'UsersController@show', function (Request $request) {
    return $request->Users();
});

Route::post('/buscar-empleado', 'UsersController@buscarUser');
//---------------------Empresa-------------------

Route::get('/empresa', 'EmpresaController@show', function (Request $request) {
    return $request->Empresa();
});
Route::post('/registro-empresa', 'EmpresaController@register');
Route::put('/actualizar-empresa/{id}', 'EmpresaController@update', function (Request $request) {
    return $request->Empresa();
});



//---------------------Productos-------------------
Route::post('/registro-producto', 'ProductosController@register');
Route::post('/buscar-producto', 'ProductosController@buscarProductos');
Route::get('/productos', 'ProductosController@show', function (Request $request) {
    return $request->Productos();
});
Route::put('/actualizar-producto/{id}', 'ProductosController@update', function (Request $request) {
    return $request->Productos();
});
Route::delete('borrar-producto/{id}', 'ProductosController@destroy');


//--------------------CLientes---------------------
Route::post('/registro-cliente', 'ClientesController@register');
Route::put('/actualizar-cliente/{id}', 'ClientesController@update', function (Request $request) {
    return $request->Clientes();
});
Route::get('/cliente', 'ClientesController@show', function (Request $request) {
    return $request->Clientes();
});
Route::delete('borrar-cliente/{id}', 'ClientesController@destroy');
Route::post('/buscar-cliente', 'ClientesController@buscarClientes');

//--------------------Entregas---------------------
Route::post('/registro-entrega', 'EntregasController@register');
Route::put('/actualizar-entrega/{id}', 'EntregasController@update', function (Request $request) {
    return $request->Entregas();
});
Route::get('/entregas', 'EntregasController@show', function (Request $request) {
    return $request->Entregas();
});
Route::delete('borrar-entrega/{id}', 'EntregasController@destroy');

//--------------------ventas--------------------
Route::post('/registro-ventas', 'VentasController@register');