<?php

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

 
    Route::get('/peralatan', [AdminPeralatan::class, 'index'])->name('peralatan.index');
    Route::get('/addPeralatan', [AdminPeralatan::class, 'addView'])->name('peralatan.addView');
    Route::post('/storePeralatan', [AdminPeralatan::class, 'store'])->name('peralatan.store');


    Route::resource('/logistik', AdminLogistikController::class);
});

require __DIR__.'/auth.php';
