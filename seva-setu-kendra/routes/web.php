<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\SchemeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SchemeController::class, 'landing'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [SchemeController::class, 'dashboard'])->name('dashboard');

    Route::middleware('role:super_admin,admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/agents', [AdminController::class, 'agents'])->name('agents');
        Route::post('/agents/{agent}/approve', [AdminController::class, 'approveAgent'])->name('agents.approve');
        Route::resource('schemes', SchemeController::class)->except(['show']);
        Route::get('/reports/commissions', [AdminController::class, 'commissionReport'])->name('reports.commissions');
    });

    Route::middleware('role:agent')->prefix('agent')->name('agent.')->group(function () {
        Route::get('/dashboard', [AgentController::class, 'dashboard'])->name('dashboard');
        Route::get('/citizens', [AgentController::class, 'citizens'])->name('citizens');
        Route::post('/applications', [AgentController::class, 'submitApplication'])->name('applications.store');
    });

    Route::middleware('role:citizen')->prefix('citizen')->name('citizen.')->group(function () {
        Route::get('/dashboard', [CitizenController::class, 'dashboard'])->name('dashboard');
        Route::get('/schemes/search', [CitizenController::class, 'search'])->name('schemes.search');
        Route::post('/recommendations', [CitizenController::class, 'recommendations'])->name('recommendations');
    });
});

Route::view('/become-agent', 'auth.become-agent')->name('become-agent');
