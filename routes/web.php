<?php

use App\Http\Controllers\Admin\AdminPesertaController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\User\PengumumanUserController;
use App\Http\Controllers\WebinarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboarduserController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LombaUser;
use App\Http\Controllers\WebinarUser;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\PengumumanController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('halaman.landingPage');
});

Route::get('/main', function () {
    return view('layouts.main');
});

Route::get('/dashboard-user',  [DashboarduserController::class, 'index']);

Route::get('/landing-page',function(){
    return view('halaman.landingPage');
})->name('landingPage');

Route::get('/admin/dashboard', function () {
    return view('halaman.dashboard');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('halaman.dashboard');

Route::get('/dashboard/admin/webinar',function(){
    return view('halaman.dashboardAdminWebinar');
})->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('halaman.dashboardAdminWebinar');;

require __DIR__.'/auth.php';

// Route::get('/admin', function(){
//     return view('halaman.dashboard');
// })->middleware(['auth', 'verified', 'RoleCheck:admin'])->name('halaman.dashboard');

//menampilkan isi form
// Lomba (admin only)
Route::middleware(['auth', 'verified', 'RoleCheck:admin'])->group(function () {
    Route::get('/admin/lomba', [LombaController::class, 'create'])->name('lomba.create');
    Route::post('/lomba', [LombaController::class, 'store'])->name('lomba.store');
    Route::get('/lomba/tabelLomba', [LombaController::class, 'index'])->name('lomba.index');
    Route::get('/lomba/tabel', [LombaController::class, 'index'])->name('lomba.index');
Route::delete('/lomba/{lomba}',[LombaController::class, 'destroy'])->name('lomba.destroy');
Route::get('/lomba/{lomba}/edit',[LombaController::class, 'edit'])->name('lomba.edit');
Route::put('/lomba/{lomba}',[LombaController::class, 'update'])->name('lomba.update');

    // Webinar (admin only)
    Route::get('/admin/webinar', [WebinarController::class, 'create'])->name('webinar.create');
    Route::post('/webinar', [WebinarController::class, 'store'])->name('webinar.store');
    Route::get('/admin/tabelWebinar', [WebinarController::class, 'index'])->name('webinar.index');
    Route::get('/webinar/{webinar}/edit', [WebinarController::class, 'edit'])->name('webinar.edit');
    Route::put('/webinar/{webinar}', [WebinarController::class, 'update'])->name('webinar.update');
    Route::delete('/webinar/{webinar}', [WebinarController::class, 'destroy'])->name('webinar.destroy');
});

Route::get('/cek-php', function () {
    phpinfo();
});

Route::get('/check-limits', function() {
    return [
        'post_max_size' => ini_get('post_max_size'),
        'upload_max_filesize' => ini_get('upload_max_filesize'),
        'max_file_uploads' => ini_get('max_file_uploads'),
        'memory_limit' => ini_get('memory_limit'),
        'max_execution_time' => ini_get('max_execution_time'),
    ];
});

// narik data lomba di landing page
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage');

// route untuk dashboard user
Route::get('/dashboardUser', function () {
    return view('halaman.dashboardUser');
})->middleware(['auth', 'verified', 'RoleCheck:user, admin'])->name('dashboardUser');

Route::middleware(['auth', 'verified', 'RoleCheck:user, admin'])->group(function () {
    // agar dahsboard user bisa narik data lomba dan webinar
    Route::get('/dashboardUser', [DashboarduserController::class, 'index'])->name('dashboardUser');
    Route::get('/dashboardUser/pengumuman', [DashboarduserController::class, 'pengumuman'])->name('dashboardUser.pengumuman');
    Route::get('/dashboardUser/lomba', [DashboarduserController::class, 'lomba'])->name('dashboardUser.lomba');
    Route::get('/dashboardUser/seminar', [DashboarduserController::class, 'seminar'])->name('dashboardUser.seminar');
    Route::get('/dashboardUser/pengumuman', [DashboarduserController::class, 'pengumuman'])->name('dashboardUser.pengumuman');
    // Edit profile user
    Route::get('/profile/edit', [DashboarduserController::class, 'edit'])->name('dashboardUser.edit');
    Route::post('/profile/update', [DashboarduserController::class, 'update'])->name('dashboardUser.update');
    // // Detail pengumuman
    Route::get('/pengumuman/{id}', [DashboarduserController::class, 'show'])->name('pengumuman.show');
    // Checkout pembayaran
    Route::get('/payment/checkout/{lomba_id}', [LombaUser::class, 'checkout'])->name('payment.checkout');
    // Sukses pembayaran
    Route::get('/payment/success', [LombaUser::class, 'success'])->name('payment.success');
    // route lomba dan webinar user
    Route::get('/user/lomba', [LombaUser::class, 'create'])->name('ulomba.create');
    Route::post('/user/lomba/daftar', [LombaUser::class, 'store'])->name('ulomba.store');
    Route::get('/user/lomba/tampil', [LombaUser::class, 'index'])->name('ulomba.index');
    Route::get('/user/webinar', [WebinarUser::class, 'create'])->name('uwebinar.create');
    Route::post('/user/webinar/daftar', [WebinarUser::class, 'store'])->name('uwebinar.store');
});

//rute admin baru
//Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

//grup buat rute admin
// Terapkan middleware 'auth' DAN 'admin'
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('halaman.dashboard');

    // Route Manajemen Admin
    Route::get('/users', [UserManagementController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('admin.users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('admin.users.store');

    // ... (Route Lomba, Webinar, dll. juga harus di dalam sini) ...
    Route::resource('pengumuman', PengumumanController::class);
    Route::resource('/admin/pengumuman', PengumumanController::class);
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('admin.users.destroy');

//rute peserta
    Route::get('/peserta', [AdminPesertaController::class, 'index']) ->name('admin.peserta.index');
    Route::get('/peserta/export-excel', [AdminPesertaController::class, 'exportExcel'])->name('peserta.exportExcel');
Route::get('/peserta/export-pdf', [AdminPesertaController::class, 'exportPdf'])->name('peserta.exportPdf');


// Di dalam grup middleware admin Anda
// Route::resource('/admin/pengumuman', PengumumanController::class);

});

//rute pengumuman



