@extends('layouts.mainUser')
@section('title', $pengumuman->judul)
@section('content')
<div class="ml-0 sm:ml-64 p-4 sm:p-6 transition-all duration-300">

    {{-- Card Pengumuman --}}
    <div class="bg-white shadow-lg rounded-2xl p-6 max-w-4xl mx-auto mt-8 mb-12">
        {{-- Judul --}}
        <h1 class="text-3xl font-bold mb-2 text-indigo-800">{{ $pengumuman->judul }}</h1>

        {{-- Tanggal --}}
        <span class="text-gray-500 text-sm mb-4 inline-block">
            {{ \Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('d F Y') }}
        </span>

        {{-- Konten --}}
        <div class="mt-4 text-gray-700 space-y-4">
            {!! $pengumuman->konten !!}
        </div>

        {{-- Tombol kembali --}}
        <a href="{{ route('dashboardUser.pengumuman') }}" 
           class="mt-6 inline-block bg-indigo-600 text-white px-6 py-2 rounded-full hover:bg-indigo-700 transition shadow-md">
            Kembali ke daftar pengumuman
        </a>
    </div>

</div>
@endsection
