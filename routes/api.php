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
Route::put('/actualizar-usuario', 'UsersController@actualizarUsuario');

Route::get('/user', 'UsersController@showAll', function (Request $request) {
    return $request->Users();
});
Route::middleware('jwt.auth:api')->post('/buscar-empleado', 'UsersController@buscarUser');
Route::middleware('jwt.auth:api')->delete('borrar-empleado/{id}', 'UsersController@destroy');
//---------------------Empresa-------------------

Route::middleware('jwt.auth:api')->get('/empresa', 'EmpresaController@show', function (Request $request) {
    return $request->Empresa();
});
Route::middleware('jwt.auth:api')->post('/registro-empresa', 'EmpresaController@register');
Route::middleware('jwt.auth:api')->put('/actualizar-empresa/{id}', 'EmpresaController@update', function (Request $request) {
    return $request->Empresa();
});



//---------------------Productos-------------------
Route::middleware('jwt.auth:api')->post('/registro-producto', 'ProductosController@register');
Route::middleware('jwt.auth:api')->post('/buscar-producto', 'ProductosController@buscarProductos');
Route::middleware('jwt.auth:api')->get('/productos', 'ProductosController@show', function (Request $request) {
    return $request->Productos();
});
Route::middleware('jwt.auth:api')->put('/actualizar-producto/{id}', 'ProductosController@update', function (Request $request) {
    return $request->Productos();
});
Route::middleware('jwt.auth:api')->get('/productos/{id}', 'ProductosController@showId', function (Request $request) {
    return $request->Clientes();
});
Route::middleware('jwt.auth:api')->delete('borrar-producto/{id}', 'ProductosController@destroy');
Route::middleware('jwt.auth:api')->post('/producto-filtro-categoria', 'ProductosController@filtroCategoria');

//--------------------CLientes---------------------
Route::middleware('jwt.auth:api')->post('/registro-cliente', 'ClientesController@register');
Route::middleware('jwt.auth:api')->put('/actualizar-cliente/{id}', 'ClientesController@update', function (Request $request) {
    return $request->Clientes();
});
Route::middleware('jwt.auth:api')->get('/cliente', 'ClientesController@show', function (Request $request) {
    return $request->Clientes();
});

Route::middleware('jwt.auth:api')->get('/cliente/{id}', 'ClientesController@showId', function (Request $request) {
    return $request->Clientes();
});
Route::middleware('jwt.auth:api')->delete('borrar-cliente/{id}', 'ClientesController@destroy');
Route::middleware('jwt.auth:api')->post('/buscar-cliente', 'ClientesController@buscarClientes');

//--------------------Entregas---------------------
Route::middleware('jwt.auth:api')->post('/registro-entrega', 'EntregasController@register');
Route::middleware('jwt.auth:api')->put('/actualizar-entrega/{id}', 'EntregasController@update', function (Request $request) {
    return $request->Entregas();
});
Route::middleware('jwt.auth:api')->get('/entregas', 'EntregasController@show', function (Request $request) {
    return $request->Entregas();
});
Route::middleware('jwt.auth:api')->delete('borrar-entrega/{id}', 'EntregasController@destroy');

//--------------------ventas--------------------
Route::middleware('jwt.auth:api')->post('/registro-ventas', 'VentasController@register');
Route::middleware('jwt.auth:api')->get('/no-cotizacion', 'VentasController@numeroCot', function (Request $request) {
    return $request->Ventas();
});
Route::middleware('jwt.auth:api')->post('/buscar-venta', 'VentasController@searchVenta');
Route::post('/email', 'EmailController@solicitarActivacion');