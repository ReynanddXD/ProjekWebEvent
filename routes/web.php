<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\WebinarController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\DashboarduserController;

=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 626752ebc3a1d537c49ee22abb9298d09daef797

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::view('/navbar',  view:'partial.navbar');

Route::view('/footer',  view:'partial.footer');

Route::get('/dashboarduser', [DashboarduserController::class, 'index'])
    ->middleware('auth')
    ->name('halaman.dashboarduser');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
=======
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
>>>>>>> 626752ebc3a1d537c49ee22abb9298d09daef797

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/dashboard', function () {
//     $user = Auth::user();

//     if ($user->role === 'admin') {
//         return redirect()->route('admin.dashboard');
//     }

//     return redirect()->route('landing.page');
// })->middleware('auth');

Route::get('/dashboard', function(){
return view('halaman.dashboard');
});

Route::get('/landing-page',function(){
    return view('halaman.landingPage');
})->name('landing.page');

Route::get('/admin-dashboard', function () {
    return view('layouts.adminLayouts');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('admin.dashboard');


// Route::get('/dashboard/admin/webinar',function(){
//     return view('halaman.dashboardAdminWebinar');
// })->middleware(['auth','verified','RoleCheck:admin'])->name('halaman.dashboardAdminWebinar');
Route::get('/dashboard/admin/webinar',function(){
    return view('halaman.dashboardAdminWebinar');
});

// Route::get(/product', [ProductController::class, 'index']);

require __DIR__.'/auth.php';

Route::get('admin', function(){
    return view('layouts.adminLayouts');
});


Route::get('/admin/dashboard', function(){
    return view('halaman.dashboard');
})->name('halaman.dashboard');

// Route::get('/admin/lomba', function(){
//     return view('halaman.dashboardAdminLomba');
// })->name('halaman.dashboardAdminLomba');

// Route::get('/admin/webinar', function(){
//     return view('halaman.dashboardAdminWebinar');
// })->name('halaman.dashboardAdminWebinar');

//menampilkan isi form
Route::get('/admin/lomba', [LombaController::class, 'create'])->name('lomba.create');
Route::post('/lomba',[LombaController::class, 'store'])->name('lomba.store');


Route::get('lomba/tabel', [LombaController::class, 'index'])->name('lomba.index');

Route::get('/admin/webinar', [WebinarController::class, 'create'])->name('webinar.create');
Route::post('/webinar', [WebinarController::class, 'store'])->name('webinar.store');


