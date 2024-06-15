<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('detail_artikel/{id}', [App\Http\Controllers\HomeController::class, 'detail_artikel']);
    Route::get('detail_produk/{id}', [App\Http\Controllers\HomeController::class, 'detail_produk']);

    Route::prefix('post')->middleware(['editor'])->group(function () {

        Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
        Route::get('create', [App\Http\Controllers\PostController::class, 'create']);
        Route::post('store', [App\Http\Controllers\PostController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\PostController::class, 'edit']);
        Route::put('update/{id}', [App\Http\Controllers\PostController::class, 'update']);
        Route::delete('destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy']);
    });

    Route::prefix('kategori')->middleware(['editor'])->group(function () {

        Route::get('/', [App\Http\Controllers\KategoriController::class, 'index']);
        Route::get('create', [App\Http\Controllers\KategoriController::class, 'create']);
        Route::post('store', [App\Http\Controllers\KategoriController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit']);
        Route::put('update/{id}', [App\Http\Controllers\KategoriController::class, 'update']);
        Route::delete('destroy/{id}', [App\Http\Controllers\KategoriController::class, 'destroy']);
    });

    Route::prefix('produk')->middleware(['editor'])->group(function () {

        Route::get('/', [App\Http\Controllers\ProdukController::class, 'index']);
        Route::get('create', [App\Http\Controllers\ProdukController::class, 'create']);
        Route::post('store', [App\Http\Controllers\ProdukController::class, 'store']);
        Route::get('edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit']);
        Route::put('update/{id}', [App\Http\Controllers\ProdukController::class, 'update']);
        Route::delete('destroy/{id}', [App\Http\Controllers\ProdukController::class, 'destroy']);
    });

    Route::prefix('user')->middleware(['admin'])->group(function () {

        Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
        Route::get('edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
        Route::put('update/{id}', [App\Http\Controllers\UserController::class, 'update']);
    });
});

Route::get('pagecontroller', [PageController::class, 'index'] );
Route::get('pagecontrollerrequest', [PageController::class, 'request'] );

Route::get('request', [PageController::class, 'requestdata'] );

// Route::get('users/{id}', function ($id) {});
// Route::post('users/{id}', function ($id) {});
// Route::put('users/{id}', function ($id) {});
// Route::delete('users/{id}', function ($id) {});

Route::get('test', function () {
    return view('coba');
});

Route::get('template', function () {
    return view('template');
});

Route::get('tabeldata', function () {
    $data = ['meja', 'kursi', 'pensil', 'pulpen', 'lampu'];
    return view('table', compact('data'));
});

// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('tambahsiswa', [SiswaController::class, 'create']);
// Route::get('tambahsiswa', [SiswaController::class, 'create']);

Route::resource('siswa', SiswaController::class)->middleware(['auth', 'admin']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
