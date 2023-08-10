<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DealController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::controller(ItemController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    Route::post('/items', 'store')->name('store');
    Route::get('/items/create', 'create')->name('create');
    Route::get('/items/{item}', 'show')->name('show');
    Route::put('/items/{item}', 'update')->name('update');
    Route::delete('/items/{item}', 'delete')->name('delete');
    Route::get('/items/{item}/edit', 'edit')->name('edit');
});

Route::controller(DealController::class)->middleware(['auth'])->group(function(){
    Route::get('/deals', 'index')->name('index2');
    Route::post('/deals/{item}','store')->name('store2');
    Route::delete('/deals/{item}', 'delete')->name('delete2');
    Route::get('/deals/{deal}', 'show')->name('show2');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
