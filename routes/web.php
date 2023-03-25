<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Auth;
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


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/pdf/create', 'PdfController@create');
        Route::post('/pdf', 'PdfController@store');
        Route::delete('/pdf/delete/{id}', 'PdfController@destroy');

        Route::group(['prefix' => 'admin'], function() {
            Route::get('dashboard', [AdminHomeController::class, 'index']);
            
            Route::group(['prefix' => 'landing'], function() {
                Route::get('', [AdminHomeController::class, 'indexLanding'])->name('admin.landing');
            });
            Route::get('wisudawan/create', [AdminHomeController::class, 'createWisudawan'])->name('admin.create.wisudawan');
            Route::post('wisudawan', [AdminHomeController::class, 'storeWisudawan'])->name('admin.store.wisudawan');
        });
    });

});
Route::get('/archive', 'ArchiveController@index');
Route::get('/archive/year/{month}/{year}', 'ArchiveController@showyear');
Route::get('download/pdf', 'PdfController@download');
Route::get('/yearbook', 'PdfController@index')->name('yearbook');
Route::get('/pdf/{id}', 'PdfController@show');
Auth::routes();
Route::get('/home', 'HomeController@index');

Route::get('/', [LandingController::class, 'index']);