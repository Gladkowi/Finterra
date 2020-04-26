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


Route::get('/', 'bakeryController@index');
Route::resource('/bakery', 'bakeryController');

Route::get('/bakery/show/{id}', 'bakeryController@showadd')->name('bakery.showadd');
Route::get('/bakery/editadd/{id}', 'bakeryController@editadd')->name('bakery.editadd');
Route::patch('/bakery/show/{id}', 'bakeryController@updateadd')->name('bakery.updateadd');
Route::delete('/bakery/delete/{id}', 'bakeryController@destroyadd')->name('bakery.destroyadd');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('bakery/', 'bakeryController@index')->name('bakery.index');
// Route::get('admin/show/{id}', 'adminController@show')->name('admin.show');
// Route::patch('admin/show/{id}', 'adminController@update')->name('admin.update');
// Route::get('admin/edit/{id}', 'adminController@edit')->name('admin.edit');
// Route::delete('admin/{id}', 'adminController@destroy')->name('admin.destroy');
// Route::get('admin/', 'adminController@index');
// Route::post('admin/', 'adminController@store')->name('admin.store');