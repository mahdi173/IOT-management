<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;

Route::get('/', function () {
    return view('home');
});

Route::get('modules', [ModuleController::class, 'index'])->name('modules.index');
Route::post('modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('api/modules', [ModuleController::class, 'getModules'])->name('modules.get');