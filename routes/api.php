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
Route::post('/registro', 'miembros@register');
Route::post('/login', 'Login@login');


Route::get('/empresa', 'EmpresaController@show', function (Request $request) {
    return $request->Empresa();
});
Route::post('/registro-empresa', 'EmpresaController@register');




//------------Productos---------------
Route::post('/registro-producto', 'ProductosController@register');