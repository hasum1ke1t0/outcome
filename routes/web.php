<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
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

Route::get('/', [ItemController::class, 'index']);
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items/create', [ItemController::class , 'create']);
Route::get('/items/{item}', [ItemController::class ,'show']);
Route::delete('/items/{item}', [ItemController::class,'delete']);
Route::put('/items/{item}', [ItemController::class, 'update']);
Route::get('/items/{item}/edit', [ItemController::class, 'edit']);