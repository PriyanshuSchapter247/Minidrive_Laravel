<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';


Route::get('image',[App\Http\Controllers\ImageController::class,'index'])->name('image');
Route::get('add-image',[App\Http\Controllers\ImageController::class,'add'])->name('add-image');
Route::Post('insert-image',[App\Http\Controllers\ImageController::class,'insert']);
Route::get('edit-image/{id}',[App\Http\Controllers\ImageController::class,'edit'])->name('edit-image');
Route::put('update-image/{id}',[App\Http\Controllers\ImageController::class,'update'])->name('update-image');
Route::get('delete-image/{id}',[App\Http\Controllers\ImageController::class,'destroy'])->name('delete-image');

Route::get('share/{id}',[App\Http\Controllers\ShareController::class,'share'])->name('share');
Route::post('send/{id}',[App\Http\Controllers\ShareController::class,'send']);

Route::get('recive-image',[App\Http\Controllers\ImageController::class,'recive'])->name('recive');


Route::get('details-image',[App\Http\Controllers\ImageController::class,'details'])->name('details');


Route::get('request-image',[App\Http\Controllers\ShareController::class,'request'])->name('request');


Route::get('trash-image',[App\Http\Controllers\ImageController::class,'trash'])->name('trash');





