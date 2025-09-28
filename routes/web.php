<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\WebinarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboarduserController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('halaman.landingPage');
});

Route::view('/navbar',  view:'partial.navbar');
Route::view('/footer',  view:'partial.footer');
Route::get('/dashboarduser', [DashboarduserController::class, 'index'])
    ->middleware('auth')
    ->name('halaman.dashboarduser');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::get('/dashboard', function () {
//  $user = Auth::user();

//     if ($user->role === 'admin') {
//         return redirect()->route('admin.dashboard');
//     }

//     return redirect()->route('landing.page');
// })->middleware('auth');

Route::get('/dashboard', function(){
return view('halaman.dashboard');
});

Route::get('/asd', function () {
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


Route::get('lomba/tabelLomba', [LombaController::class, 'index'])->name('lomba.index');

Route::get('lomba/tabel', [LombaController::class, 'index'])->name('lomba.index');
Route::get('/admin/webinar', [WebinarController::class, 'create'])->name('webinar.create');
Route::post('/webinar', [WebinarController::class, 'store'])->name('webinar.store');

Route::get('/admin/tabelWebinar', [WebinarController::class, 'index'])->name('webinar.index');

Route::get('/cek-php', function () {
    phpinfo();
});

// routes/web.php
Route::get('/check-limits', function() {
    return [
        'post_max_size' => ini_get('post_max_size'),
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'max_file_uploads' => ini_get('max_file_uploads'),
        'memory_limit' => ini_get('memory_limit'),
        'max_execution_time' => ini_get('max_execution_time'),
    ];
});
