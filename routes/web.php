<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function(){
    return view('layouts.adminLayouts');
});


Route::get('/admin/dashboard', function(){
    return view('halaman.dashboard');
})->name('halaman.dashboard');

Route::get('/admin/lomba', function(){
    return view('halaman.dashboardAdminLomba');
})->name('halaman.dashboardAdminLomba');

Route::get('/admin/webinar', function(){
    return view('halaman.dashboardAdminWebinar');
})->name('halaman.dashboardAdminWebinar');
