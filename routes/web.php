<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;

// Alapértelmezett útvonal
Route::get('/', function () {
    return view('welcome');
});
// Dolgozók lista megjelenítése
Route::get('/dolgozok', [DolgozoController::class, 'index'])->name('dolgozok.index');
// Keresés dolgozók között
Route::get('/dolgozok/search/{search?}', [DolgozoController::class, 'search'])->name('dolgozok.search');
// Dolgozó hozzáadása
Route::get('/dolgozok/add', [DolgozoController::class, 'showAddForm'])->name('dolgozok.addForm');
Route::post('/dolgozok/add', [DolgozoController::class, 'add'])->name('dolgozok.add');
// Dolgozó szerkesztése
Route::get('/dolgozok/edit/{id}', [DolgozoController::class, 'edit'])->name('dolgozok.edit');
Route::post('/dolgozok/update/{id}', [DolgozoController::class, 'update'])->name('dolgozok.update');
// Dolgozó törlése
Route::delete('/dolgozok/delete/{id}', [DolgozoController::class, 'delete'])->name('dolgozok.delete');
