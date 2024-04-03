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
use App\Http\Controllers\POSController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/user',[UserController::class, 'index']);
Route::get('/user/tambah',[UserController::class, 'tambah']);
Route::post('/user/tambah_simpan',[UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}',[UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}',[UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}',[UserController::class, 'hapus']);
Route::get('/',[WelcomeController::class, 'index']);
Route::resource('m_user',POSController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/kategori')->group(function (){
    Route::get('/', [KategoriController::class, 'index']);
    Route::get('/create', [KategoriController::class, 'create']);
    Route::post('/', [KategoriController::class, 'store']);
    Route::get('/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/delete/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
});
Route::prefix('user')->group(function () {
    Route::get('/', [userController::class, 'index']);
    Route::post('/list', [userController::class, 'list']);
    Route::get('/create', [userController::class, 'create']);
    Route::post('/', [userController::class, 'store']);
    Route::get('/{id}', [userController::class, 'show']);
    Route::get('/{id}/edit', [userController::class, 'edit']);
    Route::put('/{id}', [userController::class, 'update']);
    Route::delete('/{id}', [userController::class, 'destroy']);
});