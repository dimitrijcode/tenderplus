<?php

use App\Http\Controllers\TenderController;
use App\Http\Controllers\Userzone\DashboardController;
use App\Http\Controllers\Userzone\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
 * Public Website routes
 */
Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('tenders', [TenderController::class, 'index'])->name('tenders.index');
Route::get('tenders/{tender}', [TenderController::class, 'show'])->name('tenders.show');

// Todo: add your public routes here

/*
 * Management routes
 */
// CRUD for tenders
Route::get('admin/tenders', [App\Http\Controllers\Admin\TenderController::class, 'index'])->name('admin.tenders.index');
Route::get('admin/tenders/create', [App\Http\Controllers\Admin\TenderController::class, 'create'])->name('admin.tenders.create');
Route::post('admin/tenders', [App\Http\Controllers\Admin\TenderController::class, 'store'])->name('admin.tenders.store');
Route::get('admin/tenders/{tender}/edit', [App\Http\Controllers\Admin\TenderController::class, 'edit'])->name('admin.tenders.edit');
Route::put('admin/tenders/{tender}', [App\Http\Controllers\Admin\TenderController::class, 'update'])->name('admin.tenders.update');

/*
 * Authentication routes
 */
require __DIR__.'/auth.php';

/*
 * Userzone routes
 */
Route::middleware('auth')->group(function () {
    // For the user's dashboard (after login)
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Todo: add your Userzone routes here

    // For the user's profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
