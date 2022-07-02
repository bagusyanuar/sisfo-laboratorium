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
Route::match(['post', 'get'], '/', [\App\Http\Controllers\AuthController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {
    Route::get( '/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get( '/tambah', [\App\Http\Controllers\Admin\AdminController::class, 'add_page']);
    Route::post( '/create', [\App\Http\Controllers\Admin\AdminController::class, 'create']);
    Route::get( '/edit/{id}', [\App\Http\Controllers\Admin\AdminController::class, 'edit_page']);
    Route::post( '/patch', [\App\Http\Controllers\Admin\AdminController::class, 'patch']);
    Route::post( '/delete', [\App\Http\Controllers\Admin\AdminController::class, 'destroy']);
});

Route::group(['prefix' => 'member'], function () {
    Route::get( '/', [\App\Http\Controllers\Admin\MemberController::class, 'index']);
    Route::get( '/tambah', [\App\Http\Controllers\Admin\MemberController::class, 'add_page']);
    Route::post( '/create', [\App\Http\Controllers\Admin\MemberController::class, 'create']);
    Route::get( '/edit/{id}', [\App\Http\Controllers\Admin\MemberController::class, 'edit_page']);
    Route::post( '/patch', [\App\Http\Controllers\Admin\MemberController::class, 'patch']);
    Route::post( '/delete', [\App\Http\Controllers\Admin\MemberController::class, 'destroy']);
});

Route::group(['prefix' => 'dokter'], function () {
    Route::get( '/', [\App\Http\Controllers\Admin\DokterController::class, 'index']);
    Route::get( '/tambah', [\App\Http\Controllers\Admin\DokterController::class, 'add_page']);
    Route::post( '/create', [\App\Http\Controllers\Admin\DokterController::class, 'create']);
    Route::get( '/edit/{id}', [\App\Http\Controllers\Admin\DokterController::class, 'edit_page']);
    Route::post( '/patch', [\App\Http\Controllers\Admin\DokterController::class, 'patch']);
    Route::post( '/delete', [\App\Http\Controllers\Admin\DokterController::class, 'destroy']);
});

Route::group(['prefix' => 'pemeriksaan'], function () {
    Route::get( '/', [\App\Http\Controllers\Admin\PemeriksaanController::class, 'index']);
    Route::get( '/tambah', [\App\Http\Controllers\Admin\PemeriksaanController::class, 'add_page']);
    Route::post( '/create', [\App\Http\Controllers\Admin\PemeriksaanController::class, 'create']);
    Route::get( '/detail/{id}', [\App\Http\Controllers\Admin\PemeriksaanController::class, 'detail']);
});

Route::group(['prefix' => 'pemeriksaan-dokter'], function () {
    Route::get( '/', [\App\Http\Controllers\Dokter\PemeriksaanController::class, 'index']);
    Route::get( '/detail/{id}', [\App\Http\Controllers\Dokter\PemeriksaanController::class, 'detail']);
    Route::post( '/create', [\App\Http\Controllers\Dokter\PemeriksaanController::class, 'create']);
    Route::post( '/patch', [\App\Http\Controllers\Dokter\PemeriksaanController::class, 'patch']);
});

