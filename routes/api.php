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

Route::namespace('Api')->group(function () {

    Route::get('/grupos', 'GruposController@index');
    Route::get('/grupos/{id}', 'GruposController@find');
    Route::post('/grupos', 'GruposController@create');
    Route::put('/grupos', 'GruposController@update');
    Route::delete('/grupos/{id}', 'GruposController@destroy');

    Route::get('/contatos', 'ContatosController@index');
    Route::get('/contatos/{id}', 'ContatosController@find');
    Route::post('/contatos', 'ContatosController@create');
    Route::put('/contatos', 'ContatosController@update');
    Route::delete('/contatos/{id}', 'ContatosController@destroy');

});