@extends('layouts.mainUser')
@section('title', 'Dashboard User')
@section('content')

<div class="ml-0 sm:ml-64 p-4 sm:p-6 transition-all duration-300">

    {{-- ===================== CARD: Lomba Diikuti ===================== --}}
    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 p-6 sm:p-8 mb-10">
        <section id="lomba">
            <div class="container mx-auto">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-center mb-6 text-gray-800">
                    <span class="inline-block relative">
                        <span class="text-indigo-600">Lomba</span> yang Diikuti
                        <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-20 h-1.5 bg-amber-500 rounded-full"></span>
                    </span>
                </h2>

                @if ($lombas->isEmpty())
                    <p class="text-center text-gray-500 italic">Belum ada lomba yang diikuti.</p>
                @else
                    <div class="grid gap-5 sm:gap-6 md:gap-8
                                grid-cols-1 
                                sm:grid-cols-2 
                                lg:grid-cols-3 
                                xl:grid-cols-4 w-full">
                        @foreach ($lombas as $lomba)
                            <div class="bg-gray-50 shadow-md rounded-xl border border-gray-200 p-5 hover:shadow-lg transition">
                                <h3 class="text-lg font-bold text-indigo-700 mb-2">
                                    {{ $lomba->lomba->lomba ?? 'Lomba Tidak Ditemukan' }}
                                </h3>
                                <div class="text-sm text-gray-700 space-y-1">
                                    <p><strong>Instansi:</strong> {{ $lomba->instansi }}</p>
                                    <p><strong>Pekerjaan:</strong> {{ $lomba->pekerjaan }}</p>
                                    <p><strong>No HP:</strong> {{ $lomba->noHp }}</p>
                                    <p><strong>Waktu:</strong> 
                                        @if($lomba->lomba && $lomba->lomba->pelaksanaan)
                                            {{ \Carbon\Carbon::parse($lomba->lomba->pelaksanaan)->translatedFormat('d F Y') }}
                                        @else
                                            Belum dijadwalkan
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>

    {{-- ===================== CARD: Webinar Diikuti ===================== --}}
    <div class="bg-white shadow-xl rounded-2xl border border-gray-200 p-6 sm:p-8">
        <section id="webinar">
            <div class="container mx-auto">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-center mb-6 text-gray-800">
                    <span class="inline-block relative">
                        <span class="text-indigo-600">Webinar</span> yang Diikuti
                        <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-20 h-1.5 bg-amber-500 rounded-full"></span>
                    </span>
                </h2>

                @if ($webinars->isEmpty())
                    <p class="text-center text-gray-500 italic">Belum ada webinar yang diikuti.</p>
                @else
                    <div class="grid gap-5 sm:gap-6 md:gap-8 
                                grid-cols-1 
                                sm:grid-cols-2 
                                lg:grid-cols-3 
                                xl:grid-cols-4">
                        @foreach ($webinars as $webinar)
                            <div class="bg-gray-50 shadow-md rounded-xl border border-gray-200 p-6 hover:shadow-lg transition">
                                <h3 class="text-lg font-bold text-indigo-700 mb-3">
                                    {{ $webinar->webinar->judul ?? 'Webinar Tidak Ditemukan' }}
                                </h3>
                                <div class="text-sm text-gray-700 space-y-1">
                                    <p><strong>Instansi:</strong> {{ $webinar->instansi }}</p>
                                    <p><strong>Pekerjaan:</strong> {{ $webinar->pekerjaan }}</p>
                                    <p><strong>No HP:</strong> {{ $webinar->noHp }}</p>
                                    <p><strong>Tanggal:</strong>
                                        @if($webinar->webinar && $webinar->webinar->tanggal)
                                            {{ \Carbon\Carbon::parse($webinar->webinar->tanggal)->translatedFormat('d F Y') }}
                                        @else
                                            Belum dijadwalkan
                                        @endif
                                    </p>
                                    <p><strong>Mulai:</strong>
                                        {{ $webinar->webinar->mulai ? \Carbon\Carbon::parse($webinar->webinar->mulai)->format('H:i') . ' WIB' : '-' }}
                                    </p>
                                    <p><strong>Selesai:</strong>
                                        {{ $webinar->webinar->selesai ? \Carbon\Carbon::parse($webinar->webinar->selesai)->format('H:i') . ' WIB' : '-' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    </div>

</div>
@endsection
