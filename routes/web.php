<?php

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


#region Rutas de Menu e Inicio
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('menu/', function () {
    return view('menu');
});
#endregion

#region Rutas Pedidos

Route::get("Pedidos/view", function() {
    return view('Pedidos/view');
})->name("viewPeds");

#endregion

#region Rutas Productos

Route::get('producto/view/{from?}','ProductoController@showAll')->where('from','[0-1]+');

Route::resource('producto','ProductoController');

#endregion

#region Rutas Clientes

Route::resource('cliente','ClienteController');

#endregion


