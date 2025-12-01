
@php
    use Illuminate\Support\Str;
@endphp
@extends('layouts.mainUser')
@section('title', 'Pengumuman')
@section('content')


<div class="ml-0 sm:ml-64 p-4 sm:p-6 transition-all duration-300">

    {{-- ===================== Section Pengumuman ===================== --}}
    <section id="pengumuman" class="bg-gray-100 py-12 sm:py-16 w-full">
        {{-- Container full-width --}}
        <div class="w-full px-4 sm:px-6">

            <h2 class="text-3xl sm:text-4xl font-extrabold text-center mb-8 sm:mb-12 text-gray-800">
                <span class="relative inline-block">
                    <span class="text-indigo-600">Pengumuman</span> Terbaru
                    <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-20 sm:w-24 h-1.5 bg-amber-500 rounded-full"></span>
                </span>
            </h2>

            {{-- Wrapper horizontal scroll untuk mobile --}}
            <div class="overflow-x-auto">
                <div class="flex flex-nowrap gap-6">
                    @forelse ($pengumumans as $pengumuman)
                        @if($pengumuman->status === 'published')
                        <div class="w-full px-1">
                            <div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col justify-between min-h-[280px]">
                                <!-- Judul -->
                                <h2 class="text-xl font-bold text-indigo-700">
                                  {{ $pengumuman->judul }}
                                </h2>

                                <!-- Konten ringkas -->
                            <p class="mt-3 ">
                                   {!!Str::words (strip_tags( $pengumuman->konten), 20, '...') !!}
                                </p>

                                <!-- Bagian bawah: Tanggal + tombol -->
                                <div class="flex justify-between items-center mt-6">
                                    <span class="text-sm text-gray-500"> {{ \Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('d F Y') }}</span>
                                    <a href="{{ route('pengumuman.show', $pengumuman->id) }}"
                                    class="bg-indigo-600 text-white px-3 py-1.5  text-sm  rounded-full hover:bg-indigo-700 transition">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                        <p class="text-gray-600 text-center col-span-full">Belum ada pengumuman tersedia saat ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
