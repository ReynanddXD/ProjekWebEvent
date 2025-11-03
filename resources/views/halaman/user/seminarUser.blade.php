@extends('layouts.mainUser')
@section('title', 'Seminar')
@section('content')

    <div class="ml-0 sm:ml-64 p-4 sm:p-6 transition-all duration-300">
        {{-- ===================== Section Webinar ===================== --}}
        <section id="webinar" class="bg-gray-100 py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-extrabold text-center mb-12 text-gray-800">
                    <span class="relative inline-block">
                        <span class="text-indigo-600">Webinar</span> & Workshop Eksklusif
                        <span
                            class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1.5 bg-amber-500 rounded-full"></span>
                    </span>
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($semuaWebinar as $webinar)
                        <div
                            class="bg-white rounded-2xl overflow-hidden shadow-lg flex flex-col transition duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                            <a href="#">
                                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $webinar->gambar) }}"
                                    alt="Poster Webinar">
                            </a>

                            <div class="p-6 flex-grow">
                                <h3 class="font-bold text-xl mb-2 text-indigo-800">{{ $webinar->webinar }}</h3>
                                <ul class="text-gray-700 text-sm list-disc list-inside space-y-1">
                                    <li><span class="font-semibold">Tanggal:</span>
                                        {{ \Carbon\Carbon::parse($webinar->tanggal)->format('d F Y') }}</li>
                                    <li><span class="font-semibold">Pemateri:</span> {{ $webinar->pemateri }}</li>
                                    <li><span class="font-semibold">Waktu:</span>
                                        {{ \Carbon\Carbon::parse($webinar->mulai)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($webinar->selesai)->format('H:i') }} WIB</li>
                                    <li><span class="font-semibold">Kategori:</span> {{ $webinar->kategoriWebinar }}</li>
                                    <li><span class="font-semibold">Deskripsi:</span>
                                        {{ Str::limit($webinar->deskripsiWebinar, 100) }}</li>
                                </ul>
                            </div>
                            {{-- Tombol lihat dan Daftar --}}
                            <div class="px-6 pt-4 pb-6 flex justify-center items-center space-x-4">
                                <a href="{{ asset('storage/' . $webinar->gambar) }}" target="_blank" download
                                class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-full px-6 py-2 text-sm font-medium transition hover:scale-105 shadow-md text-center">
                                    Lihat Poster
                                </a>
                                <a href="{{ route('uwebinar.create')}}"
                                class="bg-amber-500 hover:bg-amber-600 text-white rounded-full px-6 py-2 text-sm font-medium transition hover:scale-105 shadow-md text-center">
                                    Daftar Sekarang
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 text-center col-span-full">Belum ada webinar tersedia saat ini.</p>
                    @endforelse
                </div>
            </div>
        </section>

    </div>
    <script>
        // JAVASCRIPT UNTUK SMOOTH SCROLL
        document.addEventListener('DOMContentLoaded', () => {
            const anchorLinks = document.querySelectorAll('a[href^="#"]');

            for (const anchorLink of anchorLinks) {
                anchorLink.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');
                    if (href && href.startsWith('#') && href.length > 1) {
                        e.preventDefault();

                        const targetId = href.substring(1);
                        const targetElement = document.getElementById(targetId);

                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            }
        });
    </script>
@endsection
