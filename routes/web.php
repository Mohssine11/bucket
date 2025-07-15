<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/add-student', [StudentController::class, 'create'])->name('create');
Route::post('/store-student', [StudentController::class, 'store'])->name('store');
Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('edit');
Route::put('/update-student/{id}', [StudentController::class, 'update'])->name('update');
Route::delete('/delete-student/{id}', [StudentController::class, 'destroy'])->name('delete');
Route::get('/show-student/{id}', [StudentController::class, 'show'])->name('show');