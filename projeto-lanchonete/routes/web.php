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

Route::get('/lanchonete', 'LanchoneteController@index')->name('index');

// referentes ao cliente
Route::get('/lanchonete/listarclientes', 'ClientesController@listarClientes')->name('listar_clientes');
Route::get('/lanchonete/listarclientes/adicionarcliente', 'ClientesController@adicionarCliente')->name('form_adicionar_cliente');
Route::post('/lanchonete/listarclientes/adicionarcliente', 'ClientesController@storeCliente')->name('adicionar_cliente');
Route::post('/lanchonete', 'ClientesController@storeClienteModal'); //modal
Route::delete('/lanchonete/listarclientes/{id}', 'ClientesController@destroyCliente');
Route::get('/lanchonete/listarclientes/{id}/edit', 'ClientesController@editarCliente')->name('form_editar_cliente');
Route::put('/lanchonete/listarclientes/{id}/edit', 'ClientesController@updateCliente')->name('editar_cliente');

// referentes a adicionais
Route::get('/lanchonete/listaradicionais', 'AdicionaisController@listarAdicionais')->name('listar_adicionais');
Route::get('/lanchonete/listaradicionais/adicionaradicionais', 'AdicionaisController@adicionarAdicional')->name('form_adicionar_adicional');
Route::post('/lanchonete/listaradicionais/adicionaradicionais', 'AdicionaisController@storeAdicional')->name('adicionar_adicional');
Route::post('/lanchonete', 'AdicionaisController@storeAdicionalModal'); //modal
Route::delete('/lanchonete/listaradicionais/{id}', 'AdicionaisController@destroyAdicional');
Route::get('/lanchonete/listaradicionais/{id}/edit', 'AdicionaisController@editarAdicional')->name('form_editar_adicional');
Route::put('/lanchonete/listaradicionais/{id}/edit', 'AdicionaisController@updateAdicional')->name('editar_adicional');

// referentes a bebidas
Route::get('/lanchonete/listarbebidas', 'BebidasController@listarBebidas')->name('listar_bebidas');
Route::get('/lanchonete/listarbebidas/adicionarbebidas', 'BebidasController@adicionarBebida')->name('form_adicionar_bebida');
Route::post('/lanchonete/listarbebidas/adicionarbebidas', 'BebidasController@storeBebida')->name('adicionar_bebidas');
Route::post('/lanchonete', 'BebidasController@storeBebidaModal'); //modal
Route::delete('/lanchonete/listarbebidas/{id}', 'BebidasController@destroyBebida');
Route::get('/lanchonete/listarbebidas/{id}/edit', 'BebidasController@editarBebida')->name('form_editar_bebida');
Route::put('/lanchonete/listarbebidas/{id}/edit', 'BebidasController@updateBebida')->name('editar_bebida');

// referentes a lanches
Route::get('/lanchonete/listarlanches', 'LanchesController@listarLanches')->name('listar_lanches');
Route::get('/lanchonete/listarlanches/adicionarlanche', 'LanchesController@adicionarLanche')->name('form_adicionar_lanche');
Route::post('/lanchonete/listarlanches/adicionarlanche', 'LanchesController@storeLanche')->name('adicionar_lanche');
Route::post('/lanchonete', 'LanchesController@storeLancheModal'); //modal
Route::delete('/lanchonete/listarlanches/{id}', 'LanchesController@destroyLanche');
Route::get('/lanchonete/listarlanches/{id}/edit', 'LanchesController@editarLanche')->name('form_editar_lanche');
Route::put('/lanchonete/listarlanches/{id}/edit', 'LanchesController@updateLanche')->name('editar_lanche');
