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

//HOME
Route::get('/home', 'HomeController@index')->name('home');


/////CATALOGUES/////////
//Catalogs views
Route::get('/deposit', 'CatalogueController@deposit')->name('deposit')->middleware('auth');
Route::get('/industry', 'CatalogueController@industry')->name('industry')->middleware('auth');
Route::get('/line', 'CatalogueController@line')->name('line')->middleware('auth');
Route::get('/zone', 'CatalogueController@zone')->name('zone')->middleware('auth');
//Catalogs Controllers
Route::resource('catalogs', 'CatalogueController');
Route::get('listcatalog', 'CatalogueController@list')->name('listcatalog')->middleware('auth');

/////CLIENTS/////////

Route::get('/clients', 'ClientController@client')->name('client')->middleware('auth');
Route::resource('client', 'ClientController');
Route::get('listclient', 'ClientController@list')->name('listclient')->middleware('auth');

/////PRODUCTS/////////

Route::get('/products', 'ProductController@product')->name('product')->middleware('auth');
Route::resource('product', 'ProductController');
Route::get('listproduct', 'ProductController@list')->name('listproduct')->middleware('auth');
/////PROVIDER/////////

Route::get('/providers', 'ProviderController@provider')->name('provider')->middleware('auth');
Route::resource('provider', 'ProviderController');
Route::get('listprovider', 'ProviderController@list')->name('listprovider')->middleware('auth');

/////SELLER/////////
Route::get('/sellers', 'SellerController@seller')->name('seller')->middleware('auth');
Route::resource('seller','SellerController');
Route::get('listseller', 'SellerController@list')->name('listseller')->middleware('auth');

/////BATCH/////////
Route::get('/batches', 'BatchController@batch')->name('batch')->middleware('auth');
Route::resource('batch','BatchController');

/////SHOP/////////
Route::get('/shops', 'ShopController@shop')->name('shop')->middleware('auth');
Route::resource('shop','ShopController');
Route::get('/dt_clients', 'ShopController@dt_clients')->name('dt_clients')->middleware('auth');


