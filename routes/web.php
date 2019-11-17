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

/*
    Rutas inicio y menu.
*/
#region
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('menu/', function () {
    return view('menu');
});
#endregion

/*
    Rutas cliente.
*/
#region
Route::get('Cliente/insert', function() {
    return view('Cliente/insert');
})->name('insertarCliente');

Route::get('Cliente/view', 'ControladorCliente@ViewCli')->name('ViewCliente');

Route::get('Cliente/delete/{id}','ControladorCliente@DeleteCli')->name('DeleteCliente');

Route::get('Cliente/update/{id}','ControladorCliente@SelectCli')->name('ViewUpdateCliente');

Route::post('Cliente/insert','ControladorCliente@InsertCli')->name('InsertCliente');

Route::post('Cliente/update','ControladorCliente@UpdateCli')->name('UpdateCliente');
#endregion

/*
    Rutas proveedor.
*/
#region
Route::get('Proveedor/insert','ControladorProveedor@ViewInsertPro')->name('insertarProveedor');

Route::get('Proveedor/view', 'ControladorProveedor@ViewPro')->name('ViewProveedor');

Route::get('Proveedor/delete/{id}','ControladorProveedor@DeletePro')->name('DeleteProveedor');

Route::get('Proveedor/update/{id}','ControladorProveedor@SelectPro')->name('ViewUpdateProveedor');

Route::post('Proveedor/insert','ControladorProveedor@InsertPro')->name('InsertProveedor');

Route::post('Proveedor/update','ControladorProveedor@UpdatePro')->name('UpdateProveedor');
#endregion


/*
    Rutas producto.
*/
#region
Route::get('Producto/insert','ControladorProducto@ViewInsertProd')->name('ViewInsertProducto');

Route::get('Producto/view','ControladorProducto@ViewProd')->name('ViewProducto');

Route::post('Producto/insert','ControladorProducto@InsertProd')->name('InsertProducto');
#endregion

/*
    Rutas usuario.
*/
#region
Route::get('Usuario/insert', function(){
    return view('Usuario/insert');
})->name('insertarUsuario');

Route::get('Usuario/view', function(){
    return view('Usuario/view');
})->name('listaUsuarios');
#endregion

/*
    Rutas factura.
*/
#region
Route::get('Factura/insert', function(){
    return view('Factura/insert');
})->name('insertarFactura');

Route::get('Factura/view', function(){
    return view('Factura/view');
})->name('listaFacturas');
#endregion

/*
    Rutas evaluacion factura.
 */

 Route::get('FacturaEv/insert', function(){
     return view('FacturaEv/insert');
 })->name('evFacturaInsert');

 Route::get('FacturaEv/view','ControladorFactura@ViewFact')->name('ViewFactEv');

 Route::post('FacturaEv/insert','ControladorFactura@InsertFact')->name('InsertFactEv');


 /*
    Rutas evaluacion abono
 */ 

 Route::get('AbonoEv/insert','ControladorAbono@ViewInsertAbono')->name('ViewInsertAbono');

 Route::post('AbonoEv/insert','ControladorAbono@InsertAbono')->name('InsertAbonoEv');

 Route::get('AbonoEv/view{id}','ControladorAbono@ViewAbono')->name('ViewAbono');



Route::resource('salario', 'ControladorSalario');
