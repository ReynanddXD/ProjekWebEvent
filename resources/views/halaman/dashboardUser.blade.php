@extends('layouts.main')
@section('title', 'Dashboard User')
@section('content')

<div class="space-y-12 bg-gray-50">

    {{-- ===================== Section Lomba ===================== --}}
    <section id="lomba"class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center mb-12 text-gray-800">
                <span class="relative inline-block">
                    <span class="text-indigo-600">Lomba</span> Terbaru & Populer
                    <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1.5 bg-amber-500 rounded-full"></span>
                </span>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($semuaLomba as $lomba)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg flex flex-col transition duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                        <a href="#">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $lomba->gambar) }}" alt="Poster Lomba">
                        </a>

                        <div class="p-6 flex-grow">
                            <h3 class="font-bold text-xl mb-2 text-indigo-800">{{ $lomba->lomba }}</h3>
                            <ul class="text-gray-700 text-sm list-disc list-inside space-y-1">
                                <li><span class="font-semibold">Peserta:</span> {{ $lomba->kategoriPeserta }}</li>
                                <li><span class="font-semibold">Biaya:</span> Mulai dari Rp 0</li>
                                <li><span class="font-semibold">Lokasi:</span> Online</li>
                                <li><span class="font-semibold">Penyelenggara:</span> {{ $lomba->penyelenggara }}</li>
                                <li><span class="font-semibold">Tanggal:</span> {{ \Carbon\Carbon::parse($lomba->pelaksanaan)->format('d F Y') }}</li>
                                <li><span class="font-semibold">Deskripsi:</span> {{ Str::limit($lomba->deskripsi, 100) }}</li>
                            </ul>
                        </div>

                        <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                           @if ($lomba->panduan)


                            <a href="{{ asset('storage/'.$lomba->panduan) }}"  target="_blank"download class=" bg-indigo-600 hover:bg-indigo-700 text-white rounded-full px-6 py-2 text-sm font-medium transition-colors transform hover:scale-105 shadow-md">
                                Panduan Lomba
                            </a>
                            @endif
                            <a href="{{ route ('ulomba.create')}}" class="bg-amber-500 hover:bg-amber-600 text-white rounded-full px-6 py-2 text-sm font-medium transition-colors transform hover:scale-105 shadow-md">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 text-center col-span-full">Belum ada lomba tersedia saat ini.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ===================== Section Webinar ===================== --}}
    <section id="webinar" class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-extrabold text-center mb-12 text-gray-800">
                <span class="relative inline-block">
                    <span class="text-indigo-600">Webinar</span> & Workshop Eksklusif
                    <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1.5 bg-amber-500 rounded-full"></span>
                </span>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($semuaWebinar as $webinar)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg flex flex-col transition duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                        <a href="#">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $webinar->gambar) }}" alt="Poster Webinar">
                        </a>

                        <div class="p-6 flex-grow">
                            <h3 class="font-bold text-xl mb-2 text-indigo-800">{{ $webinar->webinar }}</h3>
                            <ul class="text-gray-700 text-sm list-disc list-inside space-y-1">
                                <li><span class="font-semibold">Tanggal:</span> {{ \Carbon\Carbon::parse($webinar->tanggal)->format('d F Y') }}</li>
                                <li><span class="font-semibold">Pemateri:</span> {{ $webinar->pemateri }}</li>
                                <li><span class="font-semibold">Waktu:</span> {{ \Carbon\Carbon::parse($webinar->mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($webinar->selesai)->format('H:i') }} WIB</li>
                                <li><span class="font-semibold">Kategori:</span> {{ $webinar->kategoriWebinar }}</li>
                                <li><span class="font-semibold">Deskripsi:</span> {{ Str::limit($webinar->deskripsiWebinar, 100) }}</li>
                            </ul>
                        </div>

                        <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                            <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-full px-6 py-2 text-sm font-medium transition-colors transform hover:scale-105 shadow-md">
                                Lihat Event
                            </a>
                            <a href="{{ route ('uwebinar.create')}}" class="bg-amber-500 hover:bg-amber-600 text-white rounded-full px-6 py-2 text-sm font-medium transition-colors transform hover:scale-105 shadow-md">
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
