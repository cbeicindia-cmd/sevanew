<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\SchemeController;

// Public
Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/become-agent', [AgentController::class, 'showRegistration'])->name('agent.register.form');
Route::post('/become-agent', [AgentController::class, 'register'])->name('agent.register.submit');

// Citizen
Route::middleware(['auth', 'role:citizen'])->group(function () {
    Route::get('/citizen/dashboard', [CitizenController::class, 'dashboard'])->name('citizen.dashboard');
    Route::get('/citizen/schemes', [CitizenController::class, 'schemes'])->name('citizen.schemes');
    Route::get('/citizen/applications', [CitizenController::class, 'applications'])->name('citizen.applications');
});

// Agent
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
    Route::post('/agent/applications', [AgentController::class, 'storeApplication'])->name('agent.applications.store');
});

// Admin
Route::middleware(['auth', 'role:admin,super_admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/admin/schemes', SchemeController::class);
    Route::post('/admin/agents/{agent}/approve', [AdminController::class, 'approveAgent'])->name('admin.agents.approve');
    Route::post('/admin/agents/{agent}/reject', [AdminController::class, 'rejectAgent'])->name('admin.agents.reject');
});
