<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\InquiryController;

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

Route::get('/photos', [PhotoController::class, 'index'])->name('photos');

Route::controller(InquiryController::class)->group(function () {
    Route::get('/contactus', 'index')->name('contact-us');
    Route::post('/contactus', 'store');
});
