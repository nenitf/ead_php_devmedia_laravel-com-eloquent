<?php

use Illuminate\Support\Facades\Route;

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

/*
 * Método       Url                     Action      Nome da Rota
 *--------------------------------------------------------------
 * GET          /imoveis                index       imoveis.index
 * GET          /imoveis/create         create      imoveis.create
 * POST         /imoveis                store       imoveis.store
 * GET          /imoveis/{id}           show        imoveis.show
 * GET          /imoveis/{id}/edit      edit        imoveis.edit
 * PUT/PATCH    /imoveis/{id}           update      imoveis.update
 * DELETE       /imoveis{id}            destroy     imoveis.destroy
 */
Route::resource('imoveis', 'ImovelController');
