@extends('layouts.adminLayouts')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4">Selamat Datang di Dashboard Admin! tes</h2>

        {{-- <div class="row">
            Kartu untuk Manajemen Lomba
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Lomba</h5>
                        <p class="card-text">Lihat, tambah, edit, dan hapus semua data lomba yang sudah masuk ke dalam sistem.</p> --}}

                        {{-- INI CARA YANG BENAR: Buat link ke halaman tabel lomba --}}
                        {{-- <a href="{{ route('lomba.index') }}" class="btn btn-primary">Lihat Tabel Lomba</a>
                    </div>
                {{-- </div> --}}
            </div>


<div class="flex flex-row">
<div class="row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar data Lomba</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat semua data lomba yang sudah masuk ke dalam sistem.</p>
    <a href="{{ route('lomba.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Selengkapnya
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>

<div class="row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar data Webinar</h5>
    </a>
    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat semua data Webinar yang sudah masuk ke dalam sistem.</p>
    <a href="{{ route('webinar.index') }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Selengkapnya
        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
        </svg>
    </a>
</div>
</div>



            {{-- Kartu untuk Manajemen Webinar (jika ada) --}}
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Webinar</h5>
                        <p class="card-text">Kelola semua data webinar yang akan, sedang, atau telah dilaksanakan.</p>
                        <a href="{{ route('webinars.index') }}" class="btn btn-primary">Lihat Tabel Webinar</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
