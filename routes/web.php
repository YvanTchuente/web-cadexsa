<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\PasswordResetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('/about', AboutController::class)->name('about');

Route::controller(NewsController::class)->group(function () {
    Route::get('/news', 'index')->name('news');
    Route::get('/news/{newsArticle}', 'show')->name('news_article');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index')->name('events');
    Route::get('/events/{event}', 'show')->name('event');
});

Route::controller(PhotoController::class)->group(function () {
    Route::get('/photos', 'index')->name('photos');
    Route::get('/photos/{photo}', 'show')->where('photo', '\d+')->name('photo');
    Route::middleware('auth')->group(function () {
        Route::post('/photos/{photo}', 'update')->where('photo', '\d+')->can('update-photo', 'photo');
        Route::get('/photos/upload', 'create')->name('photo.upload');
        Route::post('/photos/upload', 'store');
    });
});

Route::controller(InquiryController::class)->group(function () {
    Route::get('/contactus', 'index')->name('contact-us');
    Route::post('/contactus', 'store');
});

Route::controller(SignupController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/signup', 'showSignupForm')->name('signup');
        Route::post('/signup', 'signup');
    });
});

Route::controller(VerificationController::class)->group(function () {
    Route::prefix('/email')->group(function () {
        Route::get('/verify', 'show')->middleware('auth')->name('verification.notice');
        Route::get('/verify/{id}/{hash}', 'verify')->middleware(['auth', 'signed'])->name('verification.verify');
        Route::get('/resend', 'resend')->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
    });
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->middleware('guest')->name('login');
    Route::post('/login', 'login')->middleware('guest');
    Route::get('/logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::controller(PasswordResetController::class)->group(function () {
        Route::get('/forgot-password', 'showLinkRequestForm')->name('password.request');
        Route::post('/forgot-password', 'sendResetLinkEmail')->name('password.email');
        Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
        Route::post('/reset-password', 'resetPassword')->name('password.update');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AccountController::class)->group(function () {
        Route::prefix('/members/{username}')->group(function () {
            Route::get('/', 'showProfile')->name('member.profile');
            Route::get('/articles', 'showArticles')->name('member.articles');
            Route::get('/photos', 'showPhotos')->name('member.photos');
        });

        Route::prefix('/account')->group(function () {
            Route::get('/', 'showAccountSettings')->name('settings.general');
            Route::post('/', 'editAccount');
            Route::get('/profile', 'showProfileSettings')->name('settings.profile');
            Route::post('/profile', 'editProfile');
            Route::get('/password', 'showPasswordEditForm')->name('settings.password');
            Route::post('/password', 'editPassword');
            Route::get('/destroy', 'confirmAccountDeletion')->name('destroy_account');
            Route::post('/destroy', 'deleteAccount');
        });
    });
});
