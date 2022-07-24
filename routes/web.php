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

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/pdf/create', 'PdfController@create');
        Route::post('/pdf', 'PdfController@store');
        Route::delete('/pdf/delete/{id}', 'PdfController@destroy');
    });

});
Route::get('/archive', 'ArchiveController@index');
Route::get('/archive/year/{month}/{year}', 'ArchiveController@showyear');
Route::get('download/pdf', 'PdfController@download');
Route::get('/', 'PdfController@index');
Route::get('/pdf/{id}', 'PdfController@show');
Auth::routes();
Route::get('/home', 'HomeController@index');