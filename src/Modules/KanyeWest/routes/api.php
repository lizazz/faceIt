<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\KanyeWest\App\Http\Controllers\Api\KanyeRestController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('kanye-rest', [KanyeRestController::class, 'index']);
    Route::get('kanye-rest2', [KanyeRestController::class, 'index2']);
});
