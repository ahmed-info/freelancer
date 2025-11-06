<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\MyjobController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'report'])->name('dashboard');
    Route::resource('fields', FieldController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('projects', ProjectController::class)->except(['show']);
Route::get('/projects/main', [FrontController::class, 'index'])->name('projects.main');
Route::get('/projects/show', [FrontController::class, 'projects'])->name('projects.show');
Route::resource('specializations', SpecializationController::class);
Route::post('/myjobs', [SpecializationController::class, 'storeJobs'])->name('myjobs.store');

require __DIR__.'/auth.php';
