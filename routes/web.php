<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BabyKidController;
use App\Http\Controllers\BeautyHealthController;
use App\Http\Controllers\FoodBeverageController;
use App\Http\Controllers\HomeCareController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;
//home
Route::get('/', [HomeController::class, 'index']);

//Category dengan subcategory
Route::prefix('category')->group(function () {
    Route::get('/foodbeverage', [FoodBeverageController::class, 'index']);
    Route::get('/homecare', [HomeCareController::class, 'index']);
    Route::get('/babykid', [BabyKidController::class, 'index']);
    Route::get('/beautyhealth', [BeautyHealthController::class, 'index']);
});

//User view
Route::get('/id/{id}/name/{name}', [UserController::class, 'index']);
//Penjualan View
Route::get('/penjualan', [PenjualanController::class, 'index']);


Route::get('/',function(){
    return view('welcome');
});
Route::get('/level',[LevelController::class, 'index']);
Route::get('/kategori',[KategoriController::class, 'index']);    