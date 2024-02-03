<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/master',[UserController::class, 'master'])->name('master.index');
    Route::get('/users/add',[UserController::class, 'add'])->name('add');
    Route::post('/users/create',[UserController::class,'create'])->name('create');
    Route::get('/staff',[UserController::class, 'staff'])->name('staff.index');
    Route::get('/management',[UserController::class,'management'])->name('management.index');
    Route::get('/users/master',[UserController::class,'back'])->name('back');
    Route::get('/users/{user}',[UserController::class,'customize'])->name('customize');
    Route::put('/users/{user}',[UserController::class,'update'])->name('update');
    Route::post('/users/task_create',[UserController::class,'task_create'])->name('task_create');
    Route::put('/users/task_create/{task}',[UserController::class,'task_add'])->name('task_add');
    Route::post('/users/task_store',[UserController::class,'task_store'])->name('task_store');
    Route::delete('/users/show/{task}/delete',[UserController::class,'task_delete'])->name('task_delete');
    Route::delete('/users/delete/{user}',[UserController::class,'user_delete'])->name('user_delete');
    Route::get('/users/{user}/employee',[UserController::class,'employee'])->name('employee');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('edit');
    Route::get('/calendar', [EventController::class, 'show'])->name("show");
    Route::post('/calendar/create',[EventController::class,'create'])->name('calendar.create');
    Route::post('/calendar/get',[EventController::class,'get']);
    Route::get('/carendars/carendar',[EventController::class,'show'])->name('show');
    Route::get('public/{task}',[UserControler::class,'uplode'])->name('uplode');
    
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
