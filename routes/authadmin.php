<?php


use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login']);

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
// Admin Logout
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


