<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\MyjobController;
use App\Http\Controllers\CompanyController;
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
Route::resource('projects', ProjectController::class)->except(['show','create']);
Route::get('/projects/main', [FrontController::class, 'index'])->name('projects.main');
Route::get('/freelance/main', [FrontController::class, 'freelance'])->name('freelance.main');
Route::get('/company/main', [FrontController::class, 'company'])->name('company.main');
Route::post('/register-company', [CompanyController::class, 'store'])->name('company.register');

Route::get('/projects/show', [FrontController::class, 'projects'])->name('projects.show');
Route::get('/profile/main', [ProfileController::class, 'profile'])->name('profile.main');
Route::get('/profile/reviews', [ProfileController::class, 'reviews'])->name('profile.reviews');
Route::get('/profile/portfolio', [ProfileController::class, 'portfolio'])->name('profile.portfolio');
Route::resource('specializations', SpecializationController::class);
Route::post('/myjobs', [SpecializationController::class, 'storeJobs'])->name('myjobs.store');


Route::middleware('freelance')
    ->group(function () {
        //Route::get('/dashboard', [StudentController::class, 'dashboard']);
        //Route::get('/courses', [StudentController::class, 'courses']);
    });

Route::get('/myprojects/create', [ProjectController::class, 'create'])->name('myprojects.create');

Route::middleware('project')
    ->group(function () {
        //Route::get('/courses', [StudentController::class, 'courses']);
    });

require __DIR__.'/auth.php';
