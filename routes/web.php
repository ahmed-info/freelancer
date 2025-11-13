<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConversationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/projects/main', [FrontController::class, 'index'])->name('projects.main');
Route::get('/freelance/main', [FrontController::class, 'freelance'])->name('freelance.main');
Route::get('/company/main', [FrontController::class, 'company'])->name('company.main');
Route::get('/projects/show', [FrontController::class, 'projects'])->name('projects.show');

Route::post('/register-company', [CompanyController::class, 'store'])->name('company.register');

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'report'])->name('dashboard');

    Route::resource('fields', FieldController::class);
    Route::resource('projects', ProjectController::class)->except(['show', 'create']);
    Route::resource('specializations', SpecializationController::class);

    Route::prefix('profile')->group(function () {
        Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('/', [ProfileController::class, 'store'])->name('profile.store');
        Route::get('/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('/myjobs', [SpecializationController::class, 'storeJobs'])->name('myjobs.store');

    Route::get('/profile/freelancer/create', [FreelancerController::class, 'create'])->name('profile.freelancer.create');
    Route::post('freelancers/store', [FreelancerController::class, 'store'])->name('freelancers.store');

    Route::prefix('messages')->group(function () {
        Route::get('/start/{freelancerId}', [ConversationController::class, 'start'])->name('messages.start');
        Route::get('/{id}', [ConversationController::class, 'show'])->name('messages.show');
        Route::post('/{id}/send', [ConversationController::class, 'sendMessage'])->name('messages.send');
        Route::delete('/{id}', [ConversationController::class, 'destroy'])->name('messages.destroy');
    });
});Route::get('freelance/dashboard', [FreelancerController::class,'dashboardfreelance'])->name('freelancer.dashboard');

Route::prefix('profile')->group(function () {
    Route::get('/main/{id}', [ProfileController::class, 'profile'])->name('profile.main');
    Route::get('/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/reviews/{id}', [ProfileController::class, 'reviews'])->name('profile.reviews');
    Route::get('/portfolio/{id}', [ProfileController::class, 'portfolio'])->name('profile.portfolio');
});

Route::prefix('freelancers')->name('freelancers.')->group(function () {
    Route::get('/', [FreelancerController::class, 'index'])->name('index');
    Route::get('/admin/index', [FreelancerController::class, 'adminIndex'])->name('admin.index');
    Route::get('/{freelancer}', [FreelancerController::class, 'show'])->name('show');
    Route::get('/{freelancer}/services', [FreelancerController::class, 'services'])->name('services');
    Route::get('/{freelancer}/projects', [FreelancerController::class, 'projects'])->name('projects');
    Route::get('/{freelancer}/reviews', [FreelancerController::class, 'reviews'])->name('reviews');
});

Route::get('/freelancers', [ProfileController::class, 'index'])->name('freelancers.index');

require __DIR__.'/auth.php';
