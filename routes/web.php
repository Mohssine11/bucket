<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// الصفحة الرئيسية تعرض قائمة الطلاب
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// عرض نموذج إضافة طالب جديد
Route::get('/add-student', [StudentController::class, 'create'])->name('create');

// تخزين بيانات الطالب الجديد
Route::post('/store-student', [StudentController::class, 'store'])->name('store');

// عرض نموذج تعديل طالب
Route::get('/edit-student/{id}', [StudentController::class, 'edit'])->name('edit');

// تحديث بيانات الطالب
Route::put('/update-student/{id}', [StudentController::class, 'update'])->name('update');

// حذف طالب
Route::delete('/delete-student/{id}', [StudentController::class, 'destroy'])->name('delete');

// عرض تفاصيل طالب واحد
Route::get('/show-student/{id}', [StudentController::class, 'show'])->name('show');