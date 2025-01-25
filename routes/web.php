<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/memos', [MemoController::class, 'index'])->name('memos.index');
    Route::get('/memos/create', [MemoController::class, 'create'])->name('memos.create');
    Route::post('/memos', [MemoController::class, 'store'])->name('memos.store');
    Route::get('/memos/{memo}/edit', [MemoController::class, 'edit'])->name('memos.edit');
    Route::put('/memos/{memo}', [MemoController::class, 'update'])->name('memos.update');
    Route::delete('/memos/{memo}', [MemoController::class, 'destroy'])->name('memos.destroy'); // P55ee
});

require __DIR__.'/auth.php';
