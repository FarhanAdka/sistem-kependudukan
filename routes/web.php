<?php

use App\Http\Controllers\KKController;
use App\Http\Controllers\PendudukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

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
Route::middleware(['guest'])->group(function(){
    Route::get('/',[SessionController::class,'login']);
    Route::post('/',[SessionController::class,'authentication']);
});
Route::get('/home',function(){
    return redirect('/user');
})->name('home');

Route::middleware(['auth'])->group(function(){
    //User
    Route::get('/user',[UserController::class,'login']);
    //Admin
    Route::middleware(['userAccess:admin'])->group(function (){
        //Dashboard, profile, log aktivitas
        Route::get('/dashboard',[UserController::class,'dashboard']);
        Route::get('/profile',[UserController::class,'profile']);
        Route::post('/profile/update',[UserController::class,'updateProfile'])->name('profile.update');
        //Route log

        //CRUD Kartu Keluarga
        //Index
        Route::get('/dataKK',[KKController::class,'index'])->name('KK.index');
        //Create
        Route::get('/inputKK',[KKController::class,'create'])->name('KK.create');
        Route::post('/simpanKK',[KKController::class,'store'])->name('KK.store');
        //Read
        Route::get('/detailKK/{id}',[KKController::class,'show'])->name('KK.detail.{no_kk}');
        //Update
        Route::get('/editKK/{id}',[KKController::class,'edit'])->name('KK.edit.{no_kk}');
        Route::put('/editKK/{id}',[KKController::class,'update'])->name('KK.update');
        Route::get('/updateKK/{id}',[KKController::class,'update']);
        //Delete
        Route::delete('/deleteKK/{id}', [KKController::class, 'destroy'])->name('KK.destroy.{no_kk}');
        //Import
        Route::post('/importKK', [KKController::class, 'import']);

        //Export

        //CRUD Penduduk
        //Index
        Route::get('/dataPenduduk',[PendudukController::class,'data'])->name('Penduduk.index');
        //Create
        Route::get('/inputPenduduk',[PendudukController::class,'create'])->name('Penduduk.create');
        Route::post('/simpanPenduduk',[PendudukController::class,'store'])->name('Penduduk.store');
        //Read
        Route::get('/detailPenduduk/{nik}',[PendudukController::class,'show'])->name('Penduduk.detail.{nik}');
        //Update
        Route::get('/editPenduduk/{nik}',[PendudukController::class,'edit'])->name('Penduduk.edit.{nik}');
        Route::put('/editPenduduk/{nik}',[PendudukController::class,'update'])->name('Penduduk.store');
        Route::get('/updatePenduduk/{nik}',[PendudukController::class,'update']);
        //Delete
        Route::delete('/deletePenduduk/{nik}', [PendudukController::class, 'destroy'])->name('Penduduk.destroy.{nik}');
        //Import
        //Export
    });

    //Logout
    Route::get('/logout',[SessionController::class,'logout']);
});
