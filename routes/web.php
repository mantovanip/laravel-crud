<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IntegradorController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/integradors', IntegradorController::class);

Route::get('/integradors', [IntegradorController::class, 'index'])->name('integradors.index');

Route::get('/integradors/create', [IntegradorController::class, 'create'])->name('integradors.create');

Route::post('/integradors', [IntegradorController::class, 'store'])->name('integradors.store');

Route::get('/integradors/{integrador}', [IntegradorController::class, 'show'])->name('integradors.show');

Route::get('/integradors/{integrador}/edit', [IntegradorController::class, 'edit'])->name('integradors.edit');

Route::put('/integradors/{integrador}', [IntegradorController::class, 'update'])->name('integradors.update');

Route::delete('/integradors/{integrador}', [IntegradorController::class, 'destroy'])->name('integradors.destroy');
