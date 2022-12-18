<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminKategorilController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDistribusiController;
use App\Http\Controllers\AdminLogistikController;
use App\Http\Controllers\AdminPeralatan;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/logistik', [GuestController::class, 'logistikView'])->name('logistik');
Route::get('/distribusi', [GuestController::class, 'distribusiView'])->name('distribusi');
Route::get('/regulasi', [GuestController::class, 'regulasiView'])->name('regulasi');
Route::get('/galery', [GuestController::class, 'galeriView'])->name('galeri');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth','admin', 'verified'])->name('dashboard');

Route::middleware('auth','admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/peralatan', [AdminPeralatan::class, 'index'])->name('peralatan.index');
    Route::get('/addPeralatan', [AdminPeralatan::class, 'addView'])->name('peralatan.addView');
    Route::get('/editPeralatan/{id}', [AdminPeralatan::class, 'editView'])->name('peralatan.editView');
    Route::get('/detailPeralatan/{id}', [AdminPeralatan::class, 'detailView'])->name('peralatan.detailView');
    Route::post('/storePeralatan', [AdminPeralatan::class, 'store'])->name('peralatan.store');
    Route::post('/deletePeralatan/{id}', [AdminPeralatan::class, 'delete'])->name('peralatan.delete');
    Route::post('/updatePeralatan', [AdminPeralatan::class, 'update'])->name('peralatan.update');


    Route::resource('/adminlogistik', AdminLogistikController::class);
    Route::resource('/admindistribusi', AdminDistribusiController::class);

    Route::get('/kategori', [AdminCategoryController::class, 'index'])->name('kategori.index');
    Route::post('/kategori/{id}', [AdminCategoryController::class, 'delete'])->name('kategori.delete');
    Route::post('/kategori', [AdminCategoryController::class, 'store'])->name('kategori.store');

    Route::get('/kategoril', [AdminKategorilController::class, 'index'])->name('kategoril.index');
    Route::post('/kategoril/{id}', [AdminKategorilController::class, 'delete'])->name('kategoril.delete');
    Route::post('/kategoril', [AdminKategorilController::class, 'store'])->name('kategoril.store');

        //verif user
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/user/addToVerif/{id}', [App\Http\Controllers\UserController::class, 'addToVerif'])->name('user.addToVerif');
    Route::post('/user/delToVerif/{id}', [App\Http\Controllers\UserController::class, 'delToVerif'])->name('user.delToVerif');
    Route::post('/user/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('user.delUser');

});

require __DIR__.'/auth.php';
