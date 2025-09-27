<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; 

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('landing.page');
})->middleware('auth');

Route::get('/landing-page',function(){
    return view('halaman.landingPage');
})->name('landing.page');

Route::get('/admin-dashboard', function () {
    return view('layouts.adminLayouts');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('admin.dashboard'); 


Route::get('/dashboard/admin/webinar',function(){
    return view('halaman.dashboardAdminWebinar');
})->middleware(['auth','verified','RoleCheck:admin'])->name('halaman.dashboardAdminWebinar');

// Route::get(/product', [ProductController::class, 'index']);

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

