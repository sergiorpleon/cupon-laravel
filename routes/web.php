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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::resource('ciudades', 'ciudadesController');

Route::resource('users', 'usersController');

Route::resource('tiendas', 'tiendasController');

Route::resource('ofertas', 'ofertasController');

Route::resource('ventas', 'ventasController');


Auth::routes();

Route::get('/', 'FrontendController@portada')->name('inicio');
Route::get('/compras', [
    'middleware' => ['auth'],
    'uses' =>  'FrontendController@compras'])->name('compras');
Route::get('/extranet', 'ExtranetController@extranet_portada')->name('extranet_portada');
Route::get('/user/logout', 'FrontendController@user_logout')->name('user_logout');
Route::match(array('GET', 'POST'),'/user/edit', 'ExtranetController@user_edit')->name('user_edit');

Route::get('/{ciudad}/recientes', 'FrontendController@ciudad_recientes')->name('ciudad_recientes');

Route::match(array('GET', 'POST'),'/extranet/oferta/nueva', 'ExtranetController@extranet_oferta_nueva')->name('extranet_oferta_nueva');
Route::match(array('GET', 'POST'),'/extranet/oferta/editar/{slug}', 'ExtranetController@extranet_oferta_editar')->name('extranet_oferta_editar');
Route::get('/extranet/oferta/ventas/{id}', 'ExtranetController@extranet_oferta_ventas')->name('extranet_oferta_ventas');
Route::match(array('GET', 'POST'),'/extranet/perfil', 'ExtranetController@extranet_perfil')->name('extranet_perfil');

Route::get('/{ciudad}/oferta/{slug}/comprar', [
    'middleware' => ['auth'],
    'uses' => 'FrontendController@comprar'])->name('comprar');
Route::get('/{ciudad}/oferta/{slug}', 'FrontendController@oferta')->name('oferta');
Route::get('/{ciudad}/tiendas/{tienda}', 'FrontendController@tienda_portada')->name('tienda_portada');
Route::get('/ciudad/cambriar-a-{ciudad}', 'FrontendController@ciudad_cambiar')->name('ciudad_cambiar');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ayuda', 'HomeController@ayuda')->name('ayuda');
Route::get('/contacto', 'HomeController@contacto')->name('contacto');
Route::get('/privacidad', 'HomeController@privacidad')->name('privacidad');
Route::get('/nosotros', 'HomeController@nosotros')->name('nosotros');

Route::get('/{ciudad}', 'FrontendController@portada')->name('portada');









Route::resource('ventas', 'ventasController');