<?php


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminKategoriLogistikController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDistribusiController;
use App\Http\Controllers\AdminPinjamController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminDistribusiItemController;
use App\Http\Controllers\AdminPinjamItemController;
use App\Http\Controllers\AdminLogistikController;
use App\Http\Controllers\AdminPeralatan;
use App\Http\Controllers\AdminPermintaanController;
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

// Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::get('/logistik', [GuestController::class, 'logistikView'])->name('logistik');
Route::get('/distribusi', [GuestController::class, 'distribusiView'])->name('distribusi');
Route::get('/regulasi', [GuestController::class, 'regulasiView'])->name('regulasi');
Route::get('/galery', [GuestController::class, 'galeriView'])->name('galeri');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin', 'verified'])->name('dashboard');

Route::middleware('auth', 'admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::get('/permintaan', [AdminPermintaanController::class, 'index'])->name('permintaan.index');
    Route::get('/permintaan/{id}', [AdminPermintaanController::class, 'show'])->name('permintaan.view');

    Route::get('/peralatan', [AdminPeralatan::class, 'index'])->name('peralatan.index');
    Route::get('/addPeralatan', [AdminPeralatan::class, 'addView'])->name('peralatan.addView');
    Route::get('/editPeralatan/{id}', [AdminPeralatan::class, 'editView'])->name('peralatan.editView');
    Route::get('/detailPeralatan/{id}', [AdminPeralatan::class, 'detailView'])->name('peralatan.detailView');
    Route::post('/storePeralatan', [AdminPeralatan::class, 'store'])->name('peralatan.store');
    Route::post('/deletePeralatan/{id}', [AdminPeralatan::class, 'delete'])->name('peralatan.delete');
    Route::post('/updatePeralatan', [AdminPeralatan::class, 'update'])->name('peralatan.update');

    Route::resource('/adminlogistik', AdminLogistikController::class);

    Route::resource('/admindistribusi', AdminDistribusiController::class);
    Route::resource('/admindistribusiItem', AdminDistribusiItemController::class);
    Route::get('/admindistribusiItemView/{id}', [AdminDistribusiItemController::class, 'createView'])->name('distribusiItem.createView');

    Route::get('/admindistribusiDraft', [AdminDistribusiController::class, 'draft'])->name('distribusi.draft');
    Route::put('/admindistribusiDraftView/{id}', [AdminDistribusiController::class, 'update'])->name('distribusi.store');
    Route::get('/admindistribusiDraftView/{id}', [AdminDistribusiController::class, 'draftView'])->name('distribusi.draftView');
    Route::get('/admindistribusi/{id}', [AdminDistribusiController::class, 'show']);


    Route::resource('/adminpinjam', AdminPinjamController::class);
    Route::resource('/adminpinjamItem', AdminPinjamItemController::class);
    Route::get('/adminpinjamItemView/{id}', [AdminPinjamItemController::class, 'createView'])->name('pinjamItem.createView');

    Route::get('/adminpinjamDraft', [AdminPinjamController::class, 'draft'])->name('pinjam.draft');
    Route::put('/adminpinjamDraftView/{id}', [AdminPinjamController::class, 'update'])->name('pinjam.store');
    Route::get('/adminpinjamDraftView/{id}', [AdminPinjamController::class, 'draftView'])->name('pinjam.draftView');
    Route::get('/adminpinjam/{id}', [AdminPinjamController::class, 'show']);

    Route::get('/kategori', [AdminCategoryController::class, 'index'])->name('kategori.index');
    Route::post('/kategori/{id}', [AdminCategoryController::class, 'delete'])->name('kategori.delete');
    Route::post('/kategori', [AdminCategoryController::class, 'store'])->name('kategori.store');

    Route::get('/kategoril', [AdminKategoriLogistikController::class, 'index'])->name('kategoril.index');
    Route::post('/kategoril/{id}', [AdminKategoriLogistikController::class, 'delete'])->name('kategoril.delete');
    Route::post('/kategoril', [AdminKategoriLogistikController::class, 'store'])->name('kategoril.store');

    Route::get('/banner', [AdminBannerController::class, 'index'])->name('banner.index');
    Route::post('/banner/{id}', [AdminBannerController::class, 'delete'])->name('banner.delete');
    Route::post('/banner', [AdminBannerController::class, 'store'])->name('banner.store');

    //verif user
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('/user/addToVerif/{id}', [App\Http\Controllers\UserController::class, 'addToVerif'])->name('user.addToVerif');
    Route::post('/user/delToVerif/{id}', [App\Http\Controllers\UserController::class, 'delToVerif'])->name('user.delToVerif');
    Route::post('/user/deleteUser/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('user.delUser');
    Route::post('/user/toAdmin/{id}', [App\Http\Controllers\UserController::class, 'toAdmin'])->name('user.toAdmin');
    Route::post('/user/toUser/{id}', [App\Http\Controllers\UserController::class, 'toUser'])->name('user.toUser');


    Route::get('/logistik/export/', [AdminLogistikController::class, 'export'])->name('export.logistik');
    Route::get('/peralatan/export/', [AdminPeralatan::class, 'export'])->name('export.peralatan');
    Route::get('/pinjam/export/', [AdminPinjamController::class, 'export'])->name('export.pinjam');
    Route::get('/distribusi/export/', [AdminDistribusiController::class, 'export'])->name('export.distribusi');
});

require __DIR__ . '/auth.php';
