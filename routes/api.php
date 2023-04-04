<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\SekolahController;

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

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:sanctum', 'OnlyAdmin'])->group(function () {
    Route::get('sekolah', [SekolahController::class, 'index'])->name('sekolah');
    Route::post('sekolah/post', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('sekolah-edit/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('sekolah-update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('sekolah-delete/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');
});