<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\BookRentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PrivateCollectionController;

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

Route::get('/', [PublicController::class, 'index']);

// route login
Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

// route user
Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);



    Route::middleware('only_client')->group(function() {
        Route::get('client', [ClientController::class, 'client']);

        // Route Peminjaman
        Route::get('peminjaman-buku', [BookRentController::class, 'index']);
        Route::post('peminjaman-buku', [BookRentController::class, 'store']);

        // user menu Pengguna
        Route::get('ulasan-pengguna', [ReviewController::class, 'ReviewUser']);
        Route::get('tambah-ulasan', [ReviewController::class, 'add']);
        Route::post('tambah-ulasan', [ReviewController::class, 'store']);

        // koleksi pengguna
        Route::get('koleksi', [PrivateCollectionController::class, 'index']);
        Route::get('tambah-koleksi', [PrivateCollectionController::class, 'add']);
        Route::post('tambah-koleksi', [PrivateCollectionController::class, 'store']);
        Route::get('hapus-koleksi/{id}', [PrivateCollectionController::class, 'delete']);
    });

    Route::middleware(['only_admin'])->group(function() {
        Route::get('admin', [AdminController::class, 'admin']);

        // User Route
        Route::get('pengguna', [UserController::class, 'index']);
        Route::get('detail-pengguna/{slug}', [UserController::class, 'detail']);
        Route::get('konfirmasi/{slug}', [UserController::class, 'confirm']);
        Route::get('hapus-pengguna/{slug}', [UserController::class, 'delete']);
        Route::get('banned-pengguna', [UserController::class, 'bannedUser']);
        Route::get('banned-petugas', [UserController::class, 'bannedPetugas']);
        Route::get('restore-pengguna/{slug}', [UserController::class, 'restore']);
        Route::get('tambah-petugas', [UserController::class, 'addPetugas']);
        Route::post('tambah-petugas', [UserController::class, 'storePetugas']);
    });

    Route::middleware(['only_petugas'])->group(function() {
        Route::get('petugas', [PetugasController::class, 'petugas']);
    });

    // admin menu
    Route::middleware(['admin_petugas'])->group(function() {
        // book route
        Route::get('buku', [BookController::class, 'index']);
        Route::get('tambah-buku', [BookController::class, 'add']);
        Route::post('tambah-buku', [BookController::class, 'store']);
        Route::get('edit-buku/{slug}', [BookController::class, 'edit']);
        Route::post('edit-buku/{slug}', [BookController::class, 'update']);
        Route::get('hapus-buku/{slug}', [BookController::class, 'delete']);
        Route::get('pulihkan-buku', [BookController::class, 'deletedBook']);
        Route::get('restore-buku/{slug}', [BookController::class, 'restore']);

        // category route
        Route::get('kategori', [CategoryController::class, 'index']);
        Route::get('tambah-kategori', [CategoryController::class, 'add']);
        Route::post('tambah-kategori', [CategoryController::class, 'store']);
        Route::get('edit-kategori/{slug}', [CategoryController::class, 'edit']);
        Route::put('edit-kategori/{slug}', [CategoryController::class, 'update']);
        Route::get('hapus-kategori/{slug}', [CategoryController::class, 'delete']);
        Route::get('pulihkan-kategori', [CategoryController::class, 'deletedCategory']);
        Route::get('restore-kategori/{slug}', [CategoryController::class, 'restore']);

        // RentLogs Route
        Route::get('laporan-peminjaman', [RentLogController::class, 'index']);
        Route::get('cetak-pdf', [RentLogController::class, 'cetakPDF']);

        Route::get('pengembalian-buku', [BookRentController::class, 'returnBook']);
        Route::post('pengembalian-buku', [BookRentController::class, 'saveReturnBook']);

        // Ulasan Admin
        Route::get('ulasan-admin', [ReviewController::class, 'ReviewAdmin']);
    });
    Route::get('hapus-ulasan/{id}', [ReviewController::class, 'delete']);



});
