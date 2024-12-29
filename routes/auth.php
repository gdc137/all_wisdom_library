<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ScriptureController;
use App\Http\Controllers\SlockController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->prefix('_admin')->group(function () {
    // login 
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.post');
    // Reset password
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth')->prefix('_admin')->group(function () {

    // profile & update password & logout
    Route::get('/change-passowrd', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Dashboard 
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Languages
    Route::get('/languages', [LanguageController::class, 'list'])->name('languages');
    Route::post('/languages/add', [LanguageController::class, 'add'])->name('languages.add');
    Route::get('/languages/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::patch('/languages/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
    Route::delete('/languages/{id}/delete', [LanguageController::class, 'delete'])->name('languages.delete');
    Route::post('/languages/change-status', [LanguageController::class, 'changeStatus'])->name('languages.change-status');

    // scriptures
    Route::get('/scriptures', [ScriptureController::class, 'list'])->name('scriptures');
    Route::post('/scriptures/add', [ScriptureController::class, 'add'])->name('scriptures.add');
    Route::get('/scriptures/{id}/edit', [ScriptureController::class, 'edit'])->name('scriptures.edit');
    Route::patch('/scriptures/{id}/edit', [ScriptureController::class, 'edit'])->name('scriptures.edit');
    Route::delete('/scriptures/{id}/delete', [ScriptureController::class, 'delete'])->name('scriptures.delete');
    Route::post('/scriptures/change-status', [ScriptureController::class, 'changeStatus'])->name('scriptures.change-status');

    // divisions
    Route::get('/divisions', [DivisionController::class, 'list'])->name('divisions');
    Route::post('/divisions', [DivisionController::class, 'list'])->name('divisions');
    Route::post('/divisions/add', [DivisionController::class, 'add'])->name('divisions.add');
    Route::get('/divisions/{id}/edit', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::patch('/divisions/{id}/edit', [DivisionController::class, 'edit'])->name('divisions.edit');
    Route::delete('/divisions/{id}/delete', [DivisionController::class, 'delete'])->name('divisions.delete');
    Route::post('/divisions/change-status', [DivisionController::class, 'changeStatus'])->name('divisions.change-status');
    Route::post('/divisions/list', [DivisionController::class, 'ajaxList'])->name('divisions.list');

    // slocks
    Route::get('/slocks', [SlockController::class, 'list'])->name('slocks');
    Route::post('/slocks', [SlockController::class, 'list'])->name('slocks');
    Route::post('/slocks/add', [SlockController::class, 'add'])->name('slocks.add');
    Route::get('/slocks/{id}/edit', [SlockController::class, 'edit'])->name('slocks.edit');
    Route::patch('/slocks/{id}/edit', [SlockController::class, 'edit'])->name('slocks.edit');
    Route::delete('/slocks/{id}/delete', [SlockController::class, 'delete'])->name('slocks.delete');
    Route::post('/slocks/change-status', [SlockController::class, 'changeStatus'])->name('slocks.change-status');
});
