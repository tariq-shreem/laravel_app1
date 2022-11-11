<?php

use App\Http\Controllers\ClietnsController;
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
Route::group(['prefix'=>'clients','as'=>'clients.'],function(){
    Route::get('/',[ClietnsController::class,'index'])->name('index');
    Route::get('/create',[ClietnsController::class,'create'])->name('create');
    Route::post('/store',[ClietnsController::class,'store'])->name('store');
    Route::get('/edit/{id}',[ClietnsController::class,'edit'])->name('edit');
    Route::put('/update',[ClietnsController::class,'update'])->name('update');
    Route::delete('/delete',[ClietnsController::class, 'delete'])->name('delete');

});

