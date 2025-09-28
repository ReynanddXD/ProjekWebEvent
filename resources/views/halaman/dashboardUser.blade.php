@extends('layouts.app')
@section('title', 'Dashboard User')
@section('content')

    <div class="p-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col transform hover:scale-105 transition-transform duration-300">
            <a href="#">
                <img class="w-full h-48 object-cover" src="{{ asset('img/lombadesign.jpeg') }}" alt="Poster Lomba Desain">
            </a>

            <div class="p-6 flex-grow">
                <h3 class="font-bold text-xl mb-2 text-gray-800">Lomba Desain Grafis 2025</h3>
                <p class="text-gray-700 text-base">
                   - SMP / Sederajat, SMA / Sederajat, Gapyear, Mahasiswa <br>
                   - Start from Rp 25.000 (16 Des 2024 - 18 Jan 2025) <br>
                   - Online <br>
                   - 16 Des 2024 - 18 Jan 2025
                </p>
            </div>

            <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Panduan Lomba
                </button>
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Daftar Sekarang
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col transform hover:scale-105 transition-transform duration-300">
            <a href="#">
                <img class="w-full h-48 object-cover" src="{{ asset('img/lombaBussiness.jpeg') }}" alt="Poster Lomba Bisnis">
            </a>

            <div class="p-6 flex-grow">
                <h3 class="font-bold text-xl mb-2 text-gray-800">Lomba CALIBER 2025</h3>
                <ul class="text-gray-700 text-base list-disc list-inside space-y-1">
                    <li>Peserta: Mahasiswa</li>
                    <li>Biaya: Mulai dari Rp 0</li>
                    <li>Lokasi: Online & Offline (Nasional)</li>
                    <li>Tanggal: 22 Sep - 19 Okt 2025</li>
                </ul>
            </div>

            <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Panduan Lomba
                </button>
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Daftar Sekarang
                </button>
            </div>
        </div>
        
        <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col transform hover:scale-105 transition-transform duration-300">
            <a href="#">
                <img class="w-full h-48 object-cover" src="https://www.infolomba.id/images/event/poster/matrix-ui-2025-80.jpeg" alt="Poster Lomba Coding">
            </a>

            <div class="p-6 flex-grow">
                <h3 class="font-bold text-xl mb-2 text-gray-800">Matrix UI 2025</h3>
                <p class="text-gray-700 text-base">                
                    - SMA / Sederajat, Mahasiswa <br>
                    - Start from Rp 150.000 (22 - 28 Sep 2025) <br>
                    - Online <br>
                    - 22 - 28 Sep 2025 <br>
                </p>
            </div>

            <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Panduan Lomba
                </button>
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Daftar Sekarang
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col transform hover:scale-105 transition-transform duration-300">
            <a href="#">
                <img class="w-full h-48 object-cover" src="https://event.ruangmahasiswa.com/images/event/cc0c8cf824ff8d33c3e68ce1b5520450.jpg" alt="Poster Lomba Coding">
            </a>

            <div class="p-6 flex-grow">
                <h3 class="font-bold text-xl mb-2 text-gray-800">DIGITAL BUSINESS ART AND SPORT INTERNAL COMPETITION ( D'BASIC )</h3>
                <p class="text-gray-700 text-base">                
                    - 04 Okt 2025 - 21 Okt 2025 <br>
                    - 08:00 WIB - 04:00 WIB <br>
                    - Online <br>
                    - Dilihat: 91 orang <br>
                    - Penyelenggara: Himpunan Digital Business Student Society (DIGCITY)
                </p>
            </div>

            <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Lihat Event
                </button>
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Daftar Sekarang
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col transform hover:scale-105 transition-transform duration-300">
            <a href="#">
                <img class="w-full h-48 object-cover" src="https://event.ruangmahasiswa.com/images/event/29d1d4c3ed83082fe4426744ea0579c0.jpg" alt="Poster Lomba Coding">
            </a>

            <div class="p-6 flex-grow">
                <h3 class="font-bold text-xl mb-2 text-gray-800">[PRESIDENT YOUTH LEADERSHIP CAMP 2025: OPEN REGISTRATION</h3>
                <p class="text-gray-700 text-base">                
                    - 11 Okt 2025 - 12 Okt 2025 <br>
                    - 09:00 WIB - 16:00 WIB <br>
                    - President university Bogor, Jawa Barat <br>
                    - Penyelenggara: President university 
                </p>
            </div>

            <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Lihat Event
                </button>
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Daftar Sekarang
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col transform hover:scale-105 transition-transform duration-300">
            <a href="#">
                <img class="w-full h-48 object-cover" src="https://event.ruangmahasiswa.com/images/event/c9c6b2857e36abd7085ed866eee0a55a.jpg" alt="Poster Lomba Coding">
            </a>

            <div class="p-6 flex-grow">
                <h3 class="font-bold text-xl mb-2 text-gray-800">OPEN HOUSE AADN UI 2025</h3>
                <p class="text-gray-700 text-base">                
                    - 11 Okt 2025 <br>
                    - Gedung M, FIA UI Depok, Jawa Barat <br>
                    - Penyelenggara: HIMANIA FIA UI
                </p>
            </div>

            <div class="px-6 pt-4 pb-6 flex justify-center space-x-4">
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Lihat Event
                </button>
                <button class="bg-[oklch(63.7%_0.237_25.331)] hover:bg-[oklch(70%_0.237_25.331)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[oklch(63.7%_0.237_25.331)] active:bg-[oklch(58%_0.237_25.331)] text-white rounded-lg px-5 py-2 text-sm font-medium transition-colors">
                    Daftar Sekarang
                </button>
            </div>
        </div>
    </div>

@endsection