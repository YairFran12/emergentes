<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('/buscar', 'buscarController@nuevaBusqueda');

//Route::get('/prueba/{sexo}/{minimo}/{maximo}', 'filtrarController@nuevaBusqueda');


//Route::post('/filtrar','filtrarControler@nuevaBusqueda');

Route::post('/filtrar/{sexo}/{inmueble}/{minimo}/{maximo}', 'buscarController@nuevaBusqueda2');

Route::post('/filtrarU/{universidad}', 'buscarController@nuevaBusqueda3');


//Route::post('/filtrar','buscarController@nuevaBusqueda2');