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
    Route::get('/grupos/{grupo}', 'GruposController@find');
    Route::post('/grupos', 'GruposController@create');
    Route::put('/grupos/{grupo}', 'GruposController@update');
    Route::delete('/grupos/{grupo}', 'GruposController@destroy');

    Route::get('/contatos', 'ContatosController@index');
    Route::get('/contatos/{contato}', 'ContatosController@find');
    Route::post('/contatos', 'ContatosController@create');
    Route::put('/contatos/{contato}', 'ContatosController@update');
    Route::delete('/contatos/{contato}', 'ContatosController@destroy');
    Route::post('/contatos/search', 'ContatosController@search');

});