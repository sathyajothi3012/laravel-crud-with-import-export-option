<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('add', [UserController::class, 'add'])->name('create');
Route::post('insert', [UserController::class, 'insert'])->name('insert');


Route::get('edit/{datas}', [UserController::class, 'edit'])->name('edit');

Route::put('update/{datas}', [UserController::class, 'update'])->name('update');
Route::delete('delete/{datas}', [UserController::class, 'delete'])->name('delete');
Route::any('view/{datas}', [UserController::class, 'view'])->name('view');

Route::get('download_Excel', [UserController::class, 'download_user'])->name('download_Excel');
Route::post('import', [UserController::class, 'import'])->name('import');
