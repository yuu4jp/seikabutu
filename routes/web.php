<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
Route::controller(ProfileController::class)->middlweware(['auth'])->groupe(function(){
    Route::get('/','profile')->name('profile');
    Route::post('/user/master/add','add')->name('add');//新規追加実行用ルーティング
    Route::get('/user/master/add/create', 'create')->name('create');//masterページからaddページに移行
});
Route::get('/calendar', [EventController::class, 'show'])->name("show");
Route::post('/calendar/create', [EventController::class, 'create'])->name("create"); // 予定の新規追加
Route::post('/calendar/get',  [EventController::class, 'get'])->name("get"); // DBに登録した予定を取得

Route::get('/dashboard', function () {
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';