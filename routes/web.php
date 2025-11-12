<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\MyjobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConversationController;
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
Route::get('/messages/start/{freelancerId}', [ConversationController::class, 'start'])->name('messages.start');
Route::get('/company/main', [FrontController::class, 'company'])->name('company.main');
Route::post('/register-company', [CompanyController::class, 'store'])->name('company.register');

Route::get('/projects/show', [FrontController::class, 'projects'])->name('projects.show');
Route::get('/profile/main/{id}', [ProfileController::class, 'profile'])->name('profile.main');
Route::get('/profile/reviews/{id}', [ProfileController::class, 'reviews'])->name('profile.reviews');
Route::get('/profile/portfolio/{id}', [ProfileController::class, 'portfolio'])->name('profile.portfolio');
Route::resource('specializations', SpecializationController::class);
Route::post('/myjobs', [SpecializationController::class, 'storeJobs'])->name('myjobs.store');



// عرض صفحة إنشاء الملف الشخصي
Route::get('/profile/create', [ProfileController::class, 'create'])
    ->name('profile.create')
    ->middleware(['auth', 'verified']);

// حفظ الملف الشخصي الجديد
Route::post('/profile', [ProfileController::class, 'store'])
    ->name('profile.store')
    ->middleware(['auth', 'verified']);

// عرض الملف الشخصي
Route::get('/profile/{id}', [ProfileController::class, 'show'])
    ->name('profile.show');

// عرض صفحة تعديل الملف الشخصي
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])
    ->name('profile.edit')
    ->middleware(['auth', 'verified']);

// تحديث الملف الشخصي
Route::put('/profile/{id}', [ProfileController::class, 'update'])
    ->name('profile.update')
    ->middleware(['auth', 'verified']);

// حذف الملف الشخصي
Route::delete('/profile/{id}', [ProfileController::class, 'destroy'])
    ->name('profile.destroy')
    ->middleware(['auth', 'verified']);

// عرض قائمة المستقلين
Route::get('/freelancers', [ProfileController::class, 'index'])
    ->name('freelancers.index');

    Route::post('freelancers/store', [FreelancerController::class,'store'])->name('freelancers.store');


Route::middleware('freelance')
    ->group(function () {
        //Route::get('/dashboard', [StudentController::class, 'dashboard']);
        //Route::get('/courses', [StudentController::class, 'courses']);
    });

Route::get('/myprojects/create', [ProjectController::class, 'create'])->name('myprojects.create');
Route::get('/profile/freelancer/create', [FreelancerController::class, 'create'])->name('profile.freelancer.create');

Route::prefix('freelancers')->name('freelancers.')->group(function () {

    // صفحة قائمة المستقلين
    Route::get('/', [FreelancerController::class, 'index'])
        ->name('index');

        Route::get('/admin/index', [FreelancerController::class, 'adminIndex'])
        ->name('admin.index');

    // صفحة البروفايل الرئيسية
    Route::get('/{freelancer}', [FreelancerController::class, 'show'])
        ->name('show');

    // صفحة جميع الخدمات
    Route::get('/{freelancer}/services', [FreelancerController::class, 'services'])
        ->name('services');

    // صفحة جميع المشاريع
    Route::get('/{freelancer}/projects', [FreelancerController::class, 'projects'])
        ->name('projects');

    // صفحة جميع التقييمات
    Route::get('/{freelancer}/reviews', [FreelancerController::class, 'reviews'])
        ->name('reviews');
});

    // عرض محادثة محددة
    Route::get('/messages/{id}', [ConversationController::class, 'show'])->name('messages.show');

    // بدء محادثة جديدة مع مستقل
    Route::get('/messages/start/{freelancerId}', [ConversationController::class, 'start'])->name('messages.start');

    // إرسال رسالة
    Route::post('/messages/{id}/send', [ConversationController::class, 'sendMessage'])->name('messages.send');

    // حذف محادثة
    Route::delete('/messages/{id}', [ConversationController::class, 'destroy'])->name('messages.destroy');

Route::middleware('project')
    ->group(function () {
        //Route::get('/courses', [StudentController::class, 'courses']);
    });

require __DIR__.'/auth.php';
