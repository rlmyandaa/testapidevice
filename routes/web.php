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
    return redirect('/input');
});
Route::get('/input', 'ApiController@index');
Route::post('/input/store', 'ApiController@store');
Route::get('/input/delete/{id}', 'ApiController@delete');
Route::get('/input/edit/{id}', 'ApiController@edit');
Route::post('/input/edit/save', 'ApiController@edit_save');
