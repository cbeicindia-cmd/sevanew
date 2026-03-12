<?php

use App\Http\Controllers\Admin\AgentApprovalController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\SchemeManagementController;
use App\Http\Controllers\Agent\ApplicationController;
use App\Http\Controllers\Auth\AgentRegistrationController;
use App\Http\Controllers\Citizen\SchemeController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/become-agent', [AgentRegistrationController::class, 'create'])->name('agent.register');
Route::post('/become-agent', [AgentRegistrationController::class, 'store'])->name('agent.register.store');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->middleware('role:super_admin,admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::patch('/agents/{user}/{status}', [AgentApprovalController::class, 'update'])->name('agents.status');
        Route::get('/schemes', [SchemeManagementController::class, 'index'])->name('schemes');
        Route::post('/schemes', [SchemeManagementController::class, 'store'])->name('schemes.store');
    });

    Route::prefix('agent')->name('agent.')->middleware('role:agent')->group(function () {
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
        Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
    });

    Route::prefix('citizen')->name('citizen.')->middleware('role:citizen')->group(function () {
        Route::get('/schemes', [SchemeController::class, 'index'])->name('schemes');
        Route::post('/recommendations', [SchemeController::class, 'recommendations'])->name('recommendations');
        Route::get('/track', [SchemeController::class, 'track'])->name('track');
    });
});
