<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\JobPhaseController;
use App\Http\Controllers\JobTaskController;
use App\Http\Controllers\ProfileController;
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

    Route::get('/joblistings', [JobListingController::class, 'index'])->name('joblistings.index');
    Route::get('/joblistings/create', [JobListingController::class, 'create'])->name('joblistings.create');
    Route::get('/joblistings/{id}', [JobListingController::class, 'show'])->name('joblistings.show');
    Route::delete('/joblistings/{id}', [JobListingController::class, 'destroy'])->name('joblistings.destroy');
    Route::get('/joblistings/edit/{id}', [JobListingController::class, 'edit'])->name('joblistings.edit');

    Route::get('/jobphases/{id}', [JobPhaseController::class, 'show'])->name('jobphases.show');

    Route::get('/jobtasks/{id}', [JobTaskController::class, 'show'])->name('jobtasks.show');
});

require __DIR__.'/auth.php';
