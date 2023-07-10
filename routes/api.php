<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatMasukController;
use App\Http\Controllers\CatKeluarController;
use App\Http\Controllers\TransMasukController;
use App\Http\Controllers\TransKeluarController;
use App\Http\Controllers\APi\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//auth
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/changerole',[AuthController::class, 'changeRole']);


//kategorimasuk
Route::get('/kategorimasuk/{id}',[CatMasukController::class, 'index']);
Route::post('/kategorimasuk/store',[CatMasukController::class, 'store']);
Route::post('/kategorimasuk/update/',[CatMasukController::class, 'update']);
Route::post('/kategorimasuk/delete/{id}',[CatMasukController::class, 'delete']);


//kategorikeluar
Route::get('/kategorikeluar/{id}',[CatKeluarController::class, 'index']);
Route::post('/kategorikeluar/store',[CatKeluarController::class, 'store']);
Route::post('/kategorikeluar/update/',[CatKeluarController::class, 'update']);
Route::post('/kategorikeluar/delete/{id}',[CatKeluarController::class, 'delete']);


//transmasuk
Route::post('/transaksimasuk/store',[TransMasukController::class, 'store']);
Route::get('/transaksimasuk/user/{id}',[TransMasukController::class, 'indexUser']);
Route::get('/transaksimasuk/kategori/{id}',[TransMasukController::class, 'indexKategori']);
Route::post('/transaksimasuk/update',[TransMasukController::class, 'update']);
Route::post('/transaksimasuk/delete/{id}',[TransMasukController::class, 'delete']);


//
Route::post('/transaksikeluar/store',[TransKeluarController::class, 'store']);
Route::get('/transaksikeluar/kategori/{id}',[TransKeluarController::class, 'indexkategori']);
Route::get('/transaksikeluar/user/{id}',[TransKeluarController::class, 'indexuser']);
Route::post('/transaksikeluar/update',[TransKeluarController::class, 'update']);
Route::post('/transaksikeluar/delete/{id}',[TransKeluarController::class, 'delete']);