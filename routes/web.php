<?php

use App\Http\Controllers\DivisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScriptureController;
use App\Http\Controllers\ShlokController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/scriptures', [ScriptureController::class, 'index'])->name('u-scriptures');
Route::get('/divisions/{id}/{slug}', [DivisionController::class, 'index'])->name('u-divisions');
Route::get('/shloks/{id}/{slug}', [ShlokController::class, 'index'])->name('u-shloks');
Route::get('/shlok/{id}/{slug}', [ShlokController::class, 'bhav'])->name('u-shlok');
Route::get('today', [HomeController::class, 'today'])->name('today');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::post('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
Route::get('/terms-policies', [HomeController::class, 'termsPolicies'])->name('terms-policies');

require __DIR__ . '/auth.php';
