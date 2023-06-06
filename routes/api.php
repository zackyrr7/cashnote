<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatMasukController;
use App\Http\Controllers\CatKeluarController;
use App\Http\Controllers\TransMasukController;
use App\Http\Controllers\TransKeluarController;


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

//kategorimasuk
Route::get('/kategorimasuk',[CatMasukController::class, 'index']);
Route::post('/kategorimasuk/store',[CatMasukController::class, 'store']);
Route::post('/kategorimasuk/update/{id}',[CatMasukController::class, 'update']);
Route::post('/kategorimasuk/delete/{id}',[CatMasukController::class, 'delete']);


//kategorikeluar
Route::get('/kategorikeluar',[CatKeluarController::class, 'index']);
Route::post('/kategorikeluar/store',[CatKeluarController::class, 'store']);
Route::post('/kategorikeluar/update/{id}',[CatKeluarController::class, 'update']);
Route::post('/kategorikeluar/delete/{id}',[CatKeluarController::class, 'delete']);


//transmasuk
Route::post('/transaksimasuk/store',[TransMasukController::class, 'store']);
Route::get('/transaksimasuk/{id}',[TransMasukController::class, 'index']);
Route::post('/transaksimasuk/update',[TransMasukController::class, 'update']);
Route::post('/transaksimasuk/delete/{id}',[TransMasukController::class, 'delete']);


//
Route::post('/transaksikeluar/store',[TransKeluarController::class, 'store']);
Route::get('/transaksikeluar/{id}',[TransKeluarController::class, 'index']);
Route::post('/transaksikeluar/update',[TransKeluarController::class, 'update']);
Route::post('/transaksikeluar/delete/{id}',[TransKeluarController::class, 'delete']);