<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Api\RegisterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/dashboard')->with('display', 'block');
})->name('landing')->middleware('auth');;

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']); // nyimpen data
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/dashboard', [KecamatanController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatan/{kecamatan:url_kecamatan}/desa', [DesaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatan/{kecamatan:url_kecamatan}/desa/{desa:url_desa}/daftar-api', [DaftarApiController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatan/{kecamatan:url_kecamatan}/desa/{desa:url_desa}/daftar-api/agama', [AgamaController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatan/{kecamatan:url_kecamatan}/desa/{desa:url_desa}/daftar-api/disabilitas', [DisabilitasController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatan/{kecamatan:url_kecamatan}/desa/{desa:url_desa}/daftar-api/status', [StatusKawinController::class, 'index'])->middleware('auth');
Route::get('/dashboard/kecamatan/{kecamatan:url_kecamatan}/desa/{desa:url_desa}/daftar-api/kasta', [KelasSosialController::class, 'index'])->middleware('auth');

Route::get('harvest', function () {
    Artisan::call('harvest:api', [
        'token' => Session::get('token'),
    ]);
    // return back();
    return redirect('/dashboard');
})->middleware('auth');