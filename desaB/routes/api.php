<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('/agama', App\Http\Controllers\Api\AgamaController::class);
// Route::apiResource('/disabilitas', App\Http\Controllers\Api\DisabilitasController::class);
// Route::apiResource('/kelassosial', App\Http\Controllers\Api\KelasSosialController::class);
// Route::apiResource('/statuskawin', App\Http\Controllers\Api\StatusKawinController::class);
// Route::apiResource('/penduduk', App\Http\Controllers\Api\PendudukController::class);
// Route::apiResource('/dusun', App\Http\Controllers\Api\DusunController::class);


Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResources([
        'agama' =>  App\Http\Controllers\Api\AgamaController::class,
        'disabilitas' =>  App\Http\Controllers\Api\DisabilitasController::class,
        'status' =>  App\Http\Controllers\Api\StatusKawinController::class,
        'kasta' =>  App\Http\Controllers\Api\KelasSosialController::class,
        'dusun' =>  App\Http\Controllers\Api\DusunController::class,
        'penduduk' =>  App\Http\Controllers\Api\PendudukController::class
    ]);
});