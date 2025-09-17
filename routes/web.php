<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

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
    return view('home.index');
})->name('home');

// clients routes
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
Route::post('/client/update/{id}', [ClientController::class, 'update'])->name('client.update');
Route::get('/client/delete/{id}', [ClientController::class, 'destroy'])->name('client.delete');

// pets routes
Route::get('/pet', [PetController::class, 'index'])->name('pet.index');
Route::get('/pet/create', [PetController::class, 'create'])->name('pet.create');
Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store');
Route::get('/pet/edit/{id}', [PetController::class, 'edit'])->name('pet.edit');
Route::post('/pet/update/{id}', [PetController::class, 'update'])->name('pet.update');
Route::get('/pet/delete/{id}', [PetController::class, 'destroy'])->name('pet.delete');
