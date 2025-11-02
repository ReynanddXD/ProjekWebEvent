@extends('layouts.mainUser')
@section('title', 'Dashboard User')
@section('content')

    <div class="ml-64 p-6">
       {{-- ===================== Section Lomba Diikuti ===================== --}}
        <section id="lomba" class="bg-gray-100 py-16">
            <div class="container mx-auto px-6">
                <h2 class="text-4xl font-extrabold text-center mb-12 text-gray-800">
                    <span class="relative inline-block">
                        <span class="text-indigo-600">Lomba</span> Yang Dikuti
                        <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1.5 bg-amber-500 rounded-full"></span>
                    </span>
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($lombaDiikuti as $lomba)
                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg flex flex-col transition duration-300 transform hover:-translate-y-2 hover:shadow-xl">
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $lomba->gambar) }}" alt="Poster Lomba">

                            <div class="p-6 flex-grow">
                                <h3 class="font-bold text-xl mb-2 text-indigo-800">{{ $lomba->lomba }}</h3>
                                <ul class="text-gray-700 text-sm list-disc list-inside space-y-1">
                                    <li><span class="font-semibold">Penyelenggara:</span> {{ $lomba->penyelenggara }}</li>
                                    <li><span class="font-semibold">Pelaksanaan:</span> {{ \Carbon\Carbon::parse($lomba->pelaksanaan)->format('d F Y') }}</li>
                                    <li><span class="font-semibold">Status:</span> <span class="text-green-600 font-medium">Sedang Diikuti</span></li>
                                </ul>
                            </div>

                            <div class="px-6 pt-4 pb-6 flex justify-center">
                                <a href="#"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-full px-6 py-2 text-sm font-medium transition hover:scale-105 shadow-md">
                                    Detail Lomba
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600 text-center col-span-full">Kamu belum mengikuti lomba apapun.</p>
                    @endforelse
                </div>
            </div>
        </section>

@endsection
