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
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;;
use App\Http\Controllers\Admin\SuicideController;
use App\Http\Middleware\ShareVariable;
use App\Http\Controllers\Front\EnquiryController as ControllersFrontEnquiryController;

Route::middleware(['auth:sanctum', 'verified'])->prefix('user')->group(function () {
    Route::get('profile/{user:id}',[ProfileController::class, 'show'])->name('user_profile_show');
});
//view share
Route::middleware([ShareVariable::class])->group(function () {
    Route::get('/', [FrontHomeController::class,'index'])->name('home');
    Route::get('/contact', [FrontHomeController::class,'contact']);
    Route::get('/about', [FrontHomeController::class,'about']);
    Route::resource('/role', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/clients', AdminClientProfileController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update','show']]);
    Route::resource('/permission', PermissionController::class);
    Route::post('/mail-enquiry', [ControllersFrontEnquiryController::class,'store'])->name('enquiry.form');
    // Route::post('/mail-enquiry', function () { // 500 internal error
    //     dd('Hello world');
    // })->name('enquiry.form');
});
Route::prefix('admin')->group(function() {
  Route::get('/', [AdminController::class, 'index'])->name('admin.home');
  Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
  Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

  Route::post('/password/email', [AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
  Route::get('/password/reset', [AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
  Route::post('/password/reset', [AdminResetPasswordController::class, 'reset'])->name('admin.password.update');
  Route::get('/password/reset/{token}', [AdminResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');

  //   settings
  Route::get('/settings/{id}', [AdminHomeController::class,'settings'])->name('settings');
  Route::post('/admin/site-details', [AdminHomeController::class,'sitedetails'])->name('site-details');
  Route::get('/admin/about/{id}',[AdminHomeController::class,'about'])->name('about-page');
  Route::post('/admin/about/update',[AdminHomeController::class,'aboutUpdate'])->name('site.about');
  Route::get('/register', [AdminRegisterController::class, 'showRegistrationForm'])->name('admin.register');
  Route::post('/register', [AdminRegisterController::class, 'register'])->name('admin.register.submit');

  Route::resource('/post', PostController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);
  Route::resource('/enquiry', EnquiryController::class,['only' => ['index', 'destroy']]);
  Route::get('/bulkDelete/{id}', [EnquiryController::class, 'bulkDelete'])->name('bulkDelete');

  Route::resource('/intern', InternController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);
  Route::resource('/suicide', SuicideController::class,['only' => ['index', 'create', 'store', 'destroy', 'edit', 'update']]);


});

