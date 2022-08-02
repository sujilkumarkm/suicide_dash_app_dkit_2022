<?php

use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\Http\Controllers\Auth\AdminResetPasswordController;
use App\Http\Controllers\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\InternController;
use App\Http\Controllers\Admin\ClientProfileController as AdminClientProfileController;
use App\Http\Controllers\Admin\SuicideController;
use Inertia\Inertia;
use App\Http\Controllers\Front\DashboardController;


Route::middleware(['guest'])->get('/', function () {

        return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        // 'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('user')->group(function () {
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard.index');
    Route::get('profile/{user:id}',[ProfileController::class, 'show'])->name('user_profile_show');
});


Route::resource('/role', RoleController::class);
Route::resource('/user', UserController::class);
Route::resource('/clients', AdminClientProfileController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update','show']]);
Route::resource('/permission', PermissionController::class);

Route::prefix('adm')->group(function() {
  Route::get('/', [AdminController::class, 'index'])->name('admin.home');
  Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
  Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

  Route::post('/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
  Route::get('/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
  Route::post('/password/reset', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');
  Route::get('/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

  Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
  Route::post('/register', [AdminRegisterController::class, 'register'])->name('admin.register.submit');

  Route::resource('/post', PostController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);
  Route::resource('/enquiry', EnquiryController::class,['only' => ['index', 'destroy']]);
  Route::get('/bulkDelete/{id}', [EnquiryController::class, 'bulkDelete'])->name('bulkDelete');

  Route::resource('/intern', InternController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);
  Route::resource('/suicide', SuicideController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);


});

