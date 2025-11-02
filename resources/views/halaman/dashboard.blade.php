@extends('layouts.adminLayouts')

@section('content')
{{--
    <div class="p-5 top-16 md:max-w-screen container border-4 border-white max-w-6xl rounded-xl shadow-sm"> --}}
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

            {{-- </div> --}}

<div class="p-2 top-5 flex flex-row">
    @include('partial.card-statistik')
</div>

   <div class="top-4">

    <h3 class="top-4 text-xl font-bold text-gray-800 mb-4">Akses Cepat</h3>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        @include('partial.cardQuickAdmin')
    </div>

    {{-- history aktivitas --}}

    <div class="w-full mt-6">

        <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">


            <div class="px-6 py-4 border-b border-gray-200">
                <h6 class="m-0 font-bold text-blue-600">Aktivitas Terbaru</h6>
            </div>

            <div class="p-0">

                <ul classclass="divide-y divide-gray-200">

                    @forelse($aktivitasTerbaru as $aktivitas)

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



                                <a href="{{ $aktivitas->url }}" class="ml-2 font-medium text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $aktivitas->judul }}
                                </a>
                            </div>

                            <small class="text-sm text-gray-500">{{ $aktivitas->created_at->diffForHumans() }}</small>
                        </li>
                    @empty

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
