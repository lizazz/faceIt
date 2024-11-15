<?php

use Illuminate\Support\Facades\Route;
use Modules\KanyeWest\App\Http\Controllers\KanyeWestController;

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

Route::group(['prefix' => 'kanyewest'], function () {
    Route::get('/', [KanyeWestController::class, 'index'])->middleware('auth')->name('kanyewest.index');
});
