<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboarduserController;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/navbar',  view:'partial.navbar');

Route::view('/footer',  view:'partial.footer');

Route::get('/dashboarduser', [DashboarduserController::class, 'index'])
    ->middleware('auth')
    ->name('halaman.dashboarduser');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin', function(){
    return view('layouts.adminLayouts');
});

Route::get('/admin/lomba', function(){
    return view('halaman.dashboardAdminLomba');
})->name('halaman.dashboardAdminLomba');

Route::get('/admin/webinar', function(){
    return view('halaman.dashboardAdminWebinar');
})->name('halaman.dashboardAdminWebinar');

