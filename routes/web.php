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

Route::get('/', function () {
    return view('welcome');
});

//Auth
Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');


/////CATALOGUES/////////

//Catalogs views
Route::get('/line', 'CatalogueController@line')->name('line')->middleware('auth');

//Datatables Catalogs
Route::get('brand/datatable', 'CatalogueController@index')->middleware('auth');

//Catalogs Controllers
Route::post('catalog/store',         'CatalogueController@store')->name('catalog.store')->middleware('auth');
Route::post('catalog/show{id}',          'CatalogueController@show')->name('catalog.show')->middleware('auth');
Route::get('catalog/edit/{id}',      'CatalogueController@edit' )->name('catalog.edit')->middleware('auth');
Route::put('catalog/update/{id}',    'CatalogueController@update')->name('catalog.update')->middleware('auth');
Route::delete('catalog/delete/{id}', 'CatalogueController@destroy')->name('catalog.delete')->middleware('auth');