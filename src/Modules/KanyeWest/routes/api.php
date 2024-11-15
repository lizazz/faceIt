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

Route::middleware('api.token')->prefix('v1/kanye-rest')->group(function () {
    Route::get('/', [KanyeRestController::class, 'index'])->name('api.kanye.rest.index');
    Route::get('/update', [KanyeRestController::class, 'update'])->middleware('api.token')
        ->name('api.kanye.rest.update');
});
