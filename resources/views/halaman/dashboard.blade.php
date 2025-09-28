@extends('layouts.adminLayouts')

@section('content')
    <div class=""></div>
    <div class="p-5 md:max-w-screen container border-4 border-white max-w-6xl rounded-xl bg-[#1E3A8A] shadow-sm">
        <h1 class="text-2xl text-white">DASHBOARD</h1>
        <h2 class="mb-4">Kejar mimpi setinggi langit!</h2>

        {{-- <div class="row">
            Kartu untuk Manajemen Lomba
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Lomba</h5>
                        <p class="card-text">Lihat, tambah, edit, dan hapus semua data lomba yang sudah masuk ke dalam
                            sistem.</p> --}}

                        {{-- INI CARA YANG BENAR: Buat link ke halaman tabel lomba --}}
                        {{-- <a href="{{ route('lomba.index') }}" class="btn btn-primary">Lihat Tabel Lomba</a>
                    </div>
                    {{--
                </div> --}}
            </div>


            <div class="flex items-center justify-center min-h-screen bg-gray-100 ">
                <div class="grid grid-cols-2 gap-2 p-6  md:grid-cols-2">
                <div class="mr-5 row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-[#1E3A8A] dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar data Lomba
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat semua data lomba yang sudah masuk ke
                        dalam sistem.</p>
                    <a href="{{ route('lomba.index') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#FACC15] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#d3ac12] dark:hover:bg-[#ee0c0c] dark:focus:ring-blue-800">
                        Selengkapnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>

                <div
                    class="row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-[#1E3A8A] dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar data Webinar
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat semua data Webinar yang sudah masuk
                        ke dalam sistem.</p>
                    <a href="{{ route('webinar.index') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#FACC15] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#d3ac12] dark:hover:bg-[#ee0c0c] dark:focus:ring-blue-800">
                        Selengkapnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>


                <div
                    class="row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-[#1E3A8A] dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Input data Webinar
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Input data Webinar
                        ke dalam sistem.</p>
                    <a href="{{ route('webinar.create') }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#FACC15] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#d3ac12] dark:hover:bg-[#ee0c0c] dark:focus:ring-blue-800">
                        Selengkapnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>

                 <div
                class="row max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-[#1E3A8A] dark:border-gray-700">
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar data Webinar
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Input data Lomba
                    ke dalam sistem.</p>
                <a href="{{ route('lomba.create') }}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-[#FACC15] rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[#d3ac12] dark:hover:bg-[#ee0c0c] dark:focus:ring-blue-800">
                    Selengkapnya
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
            </div>
        </div>

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
