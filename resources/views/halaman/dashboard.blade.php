@extends('layouts.adminLayouts')

@section('content')
    <div class=""></div>
    <div class="p-5 top-16 md:max-w-screen container border-4 border-white max-w-6xl rounded-xl shadow-sm">
        {{-- <h1 class="text-2xl text-white decoration-10  font-bold">DASHBOARD</h1>
        <h2 class="mb-4  text-white">Kejar mimpi setinggi langit!</h2> --}}

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

<div class="top-5 flex flex-row">
    @include('partial.card-statistik')
</div>
            {{-- <div class="flex items-center justify-center bg-gray-100 ">

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
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Input data Lomba
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

        </div> --}}
   <div>
    {{--
        Styling heading standar Tailwind.
        'mb-4' (1rem) untuk memberi jarak ke 'Akses Cepat'.
    --}}
    <h3 class="text-xl font-bold text-gray-800 mb-4">Akses Cepat</h3>

    {{--
        'list-group flex flex-row' (Bootstrap/Mix) -> 'grid' (Tailwind)
        Menggunakan Grid CSS adalah cara Tailwind yang paling umum dan responsif
        untuk menampilkan item 'cardQuickAdmin' Anda secara horizontal.
        - 'grid-cols-1': 1 kolom di layar HP
        - 'sm:grid-cols-2': 2 kolom di layar kecil
        - 'lg:grid-cols-4': 4 kolom di layar besar
        - 'gap-4': Memberi jarak antar kartu
        - 'mb-6': Memberi jarak bawah (margin-bottom 1.5rem)
    --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @include('partial.cardQuickAdmin')
    </div>

    {{-- history aktivitas --}}
    {{--
        'col-lg-12' (Bootstrap Grid) -> 'w-full mt-6' (Tailwind)
        'w-full' adalah default, tapi 'mt-6' (margin-top 1.5rem) penting
        untuk memberi jarak dari 'Akses Cepat' di atas.
    --}}
    <div class="w-full mt-6">
        {{-- 'card shadow mb-4' (Bootstrap) -> Styling kartu Tailwind --}}
        <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">

            {{-- 'card-header py-3' -> Styling header kartu Tailwind --}}
            <div class="px-6 py-4 border-b border-gray-200">
                {{-- 'font-weight-bold' -> 'font-bold', 'text-primary' -> 'text-blue-600' --}}
                <h6 class="m-0 font-bold text-blue-600">Aktivitas Terbaru</h6>
            </div>

            {{-- 'card-body' -> 'p-6'. Kita hapus padding di sini agar list bisa 'flush' --}}
            {{--
                CATATAN: Untuk 'list-group-flush' (Bootstrap), list item-nya
                menyentuh tepi kiri dan kanan card.
                Untuk meniru ini, kita HAPUS padding dari card-body ('p-0').
            --}}
            <div class="p-0">
                {{--
                    'list-group list-group-flush' (Bootstrap) -> 'divide-y' (Tailwind)
                    'divide-y' adalah cara Tailwind terbaik untuk meniru 'list-group'.
                    Ini akan otomatis menambahkan garis batas di antara setiap 'li'.
                --}}
                <ul classclass="divide-y divide-gray-200">

                    @forelse($aktivitasTerbaru as $aktivitas)
                        {{--
                            'list-group-item d-flex...' (Bootstrap) -> 'flex ...' (Tailwind)
                            'px-6 py-4' ditambahkan di sini untuk menggantikan padding 'list-group-item'
                            yang kita hilangkan dari 'card-body' di atas.
                        --}}
                        <li class="flex justify-between items-center px-6 py-4">
                            {{-- Wrapper untuk badge dan link agar rapi --}}
                            <div class="flex items-center">
                                @if($aktivitas->tipe == 'Lomba')
                                    {{-- 'badge badge-primary' (Bootstrap) -> Badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Lomba
                                    </span>
                                @elseif($aktivitas->tipe =='Webinar')
                                    {{-- 'badge badge-success' (Bootstrap) -> Badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Webinar
                                    </span>
                                {{--
                                    TYPO FIX: Saya perbaiki 'Admin')>' menjadi 'Admin')'
                                --}}
                                @elseif($aktivitas->tipe == 'Admin')
                                    {{-- 'badge badge-warning' (Bootstrap) -> Badge Tailwind --}}
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Admin
                                    </span>
                                @endif

                                {{--
                                    'ml-2' (Bootstrap 0.5rem) -> 'ml-2' (Tailwind 0.5rem)
                                    Menambahkan styling link agar terlihat seperti link.
                                --}}
                                <a href="{{ $aktivitas->url }}" class="ml-2 font-medium text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $aktivitas->judul }}
                                </a>
                            </div>
                            {{-- 'small' (HTML) -> Styling 'small' Tailwind --}}
                            <small class="text-sm text-gray-500">{{ $aktivitas->created_at->diffForHumans() }}</small>
                        </li>
                    @empty
                        {{-- 'list-group-item' -> Cukup tambahkan padding --}}
                        <li class="px-6 py-4 text-gray-500">Belum ada aktivitas.</li>
                    @endforelse

                </ul>
            </div>
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
