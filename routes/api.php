<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\LogoutController;
use App\Http\Controllers\API\SekolahController;
use App\Http\Controllers\API\BookMarkController;
use App\Http\Controllers\API\User\UserSekolahController;
use App\Http\Controllers\API\User\UserBookMarkController;

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
    //sekolah api route
    Route::get('sekolah', [SekolahController::class, 'index'])->name('sekolah');
    Route::post('sekolah/post', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('sekolah-edit/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::put('sekolah-update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::delete('sekolah-delete/{id}', [SekolahController::class, 'destroy'])->name('sekolah.destroy');

    //BookMark api route
    Route::get('bookmark', [BookMarkController::class, 'index'])->name('bookmark');
    Route::post('bookmark/post', [BookMarkController::class, 'store'])->name('bookmark.store');
    Route::get('bookmark-edit/{id}', [BookMarkController::class, 'edit'])->name('bookmark.edit');
    Route::put('bookmark-update/{id}', [BookMarkController::class, 'update'])->name('bookmark.update');
    Route::delete('bookmark-delete/{id}', [BookMarkController::class, 'destroy'])->name('bookmark.destroy');
});

Route::middleware(['auth:sanctum', 'OnlyUser'])->group(function () {
    //sekolah api route
    Route::get('sekolah-data', [UserSekolahController::class, 'index'])->name('sekolah.data');
    Route::get('sekolah-show/{id}', [UserSekolahController::class, 'show'])->name('sekolah.data.show');
    Route::post('add-to-bookmark', [UserSekolahController::class, 'bookmark'])->name('sekolah.bookmark');
    Route::get('search', [UserSekolahController::class, 'search'])->name('sekolah.search');
});


Route::middleware(['auth:sanctum', 'OnlyUser'])->group(function () {
    //data user bookmark
    Route::get('user-bookmark', [UserBookMarkController::class, 'index'])->name('user.bookmark');
});