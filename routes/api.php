<?php

use App\Http\Controllers\API\AuthController;
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
    Route::post('laporan', [\App\Http\Controllers\API\LaporanController::class, 'store']);
    Route::get('banner', [\App\Http\Controllers\API\BannerController::class, 'getBanner']);

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('logout',[AuthController::class,'logout']);
    Route::get('inventaris', [\App\Http\Controllers\API\InventarisController::class, 'getInventaris']);
    Route::get('logistiks', [\App\Http\Controllers\API\InventarisController::class, 'getLogistik']);
    Route::get('peralatan', [\App\Http\Controllers\API\InventarisController::class, 'getPeralatan']);
    
    Route::get('zona', [\App\Http\Controllers\API\WilayahController::class, 'getZona']);
    Route::get('kota', [\App\Http\Controllers\API\WilayahController::class, 'getKota']);
});

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

