<?php

use App\Http\Controllers\Voyager\VoyagerChunkController;
use App\Http\Controllers\Voyager\VoyagerPositionController;

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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('order_row',
        VoyagerPositionController::class)
        ->name('voyager.order_row');
    Route::post('/{slug}/chunks', [ VoyagerChunkController::class, 'uploadFile'])->name('voyager.chunks.store');
});
