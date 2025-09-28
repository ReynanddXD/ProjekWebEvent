<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventPro - Your Premier Event Organizer</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        /* CSS Tambahan */
        .hero-bg {
            background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1540575467063-178a50b28461?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
        }
        
        /* Animasi untuk efek masuk */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-fade-in-up { animation: fadeInUp 1s ease-out; }
        .animate-fade-in-down { animation: fadeInDown 1s ease-out 0.5s forwards; opacity: 0; }
        .animate-fade-in { animation: fadeIn 1.5s ease-out 1s forwards; opacity: 0; }
    </style>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <section class="hero-bg h-screen flex flex-col justify-center items-center text-center text-white p-4">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-wide mb-4 animate-fade-in-up">
                Kami Wujudkan <span class="text-indigo-400">Event Impianmu</span>
            </h1>
            <p class="text-lg md:text-xl font-light mb-8 animate-fade-in-down">
                Dari konser megah hingga intimate gathering, kami hadir untuk membuat setiap momen tak terlupakan.
            </p>
            <a href="#contact" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg animate-fade-in">
                Mulai Sekarang
            </a>
        </div>
    </section>

    <section id="services" class="bg-white py-20 px-4">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Layanan Kami</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="text-5xl text-indigo-600 mb-4">🎤</div>
                    <h3 class="text-xl font-semibold mb-2">Konser & Pertunjukan</h3>
                    <p class="text-gray-600">Manajemen lengkap untuk acara musik, pertunjukan seni, dan pameran.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="text-5xl text-indigo-600 mb-4">🎓</div>
                    <h3 class="text-xl font-semibold mb-2">Seminar & Workshop</h3>
                    <p class="text-gray-600">Fasilitasi profesional untuk acara edukasi, konferensi, dan workshop.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-lg text-center transform hover:scale-105 transition duration-300">
                    <div class="text-5xl text-indigo-600 mb-4">🥳</div>
                    <h3 class="text-xl font-semibold mb-2">Pesta & Perayaan</h3>
                    <p class="text-gray-600">Perencanaan detail untuk pesta ulang tahun, pernikahan, dan gathering.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="why-us" class="bg-gray-100 py-20 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">Kenapa Pilih Kami?</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-5xl text-indigo-500 mb-4">💡</div>
                    <h3 class="text-xl font-semibold mb-2">Kreatif & Inovatif</h3>
                    <p class="text-gray-600">Kami selalu hadir dengan ide-ide segar untuk setiap event.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-5xl text-indigo-500 mb-4">✔️</div>
                    <h3 class="text-xl font-semibold mb-2">Profesional & Terpercaya</h3>
                    <p class="text-gray-600">Tim kami berpengalaman dalam menangani berbagai skala event.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-5xl text-indigo-500 mb-4">🤝</div>
                    <h3 class="text-xl font-semibold mb-2">Pelayanan Prima</h3>
                    <p class="text-gray-600">Kepuasan klien adalah prioritas utama kami.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="text-5xl text-indigo-500 mb-4">✨</div>
                    <h3 class="text-xl font-semibold mb-2">Sistem Terintegrasi</h3>
                    <p class="text-gray-600">Manajemen event yang terstruktur dan mudah diakses.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="featured-events" class="py-20 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12">Event Terbaru</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1519750153833-85579f18b628?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Event Musik" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Mega Music Fest</h3>
                        <p class="text-gray-600 text-sm mb-4">Konser musik dengan 10+ artis ternama. Cek keseruannya!</p>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-300">Lihat Detail &rarr;</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1505373877841-86699d457639?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Konferensi" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Innovation Tech Summit</h3>
                        <p class="text-gray-600 text-sm mb-4">Konferensi teknologi terbesar tahun ini. Dapatkan wawasan terbaru.</p>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-300">Lihat Detail &rarr;</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1517409419266-9e6b36449176?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Pameran Seni" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Art & Craft Festival</h3>
                        <p class="text-gray-600 text-sm mb-4">Pameran seni dan kerajinan dari seniman lokal dan internasional.</p>
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold transition-colors duration-300">Lihat Detail &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="bg-gray-100 py-20 px-4">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">Kata Mereka</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <p class="text-gray-700 italic mb-4">"Layanan EventPro sangat profesional dan detail. Acara seminar kami berjalan sukses besar berkat mereka!"</p>
                    <div class="font-semibold text-gray-900">- Budi Santoso, Direktur PT Maju Jaya</div>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <p class="text-gray-700 italic mb-4">"Tim yang sangat kreatif! Pesta ulang tahun saya menjadi event paling berkesan. Terima kasih EventPro!"</p>
                    <div class="font-semibold text-gray-900">- Sarah Wijaya, Klien Pribadi</div>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <p class="text-gray-700 italic mb-4">"Mereka mengurus semuanya dengan sempurna. Kami sangat puas dengan hasil konser yang mereka tangani."</p>
                    <div class="font-semibold text-gray-900">- Rian, Event Manager Musik Indie</div>
                </div>
            </div>
        </div>
    </section>

    <section id="cta" class="bg-indigo-600 text-white py-20 px-4 text-center">
        <div class="container mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap untuk Eventmu?</h2>
            <p class="text-lg mb-8">Hubungi kami sekarang untuk konsultasi gratis dan wujudkan event impianmu.</p>
            <a href="#contact" class="bg-white text-indigo-600 hover:bg-gray-200 font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105 shadow-lg">
                Hubungi Kami
            </a>
        </div>
    </section>

    <footer class="bg-gray-800 text-white py-12 px-4">
        <div class="container mx-auto text-center md:text-left">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">EventPro</h3>
                    <p class="text-gray-400 text-sm">Event Organizer terbaik untuk semua kebutuhan acaramu.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Layanan</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Konser</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Seminar</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pesta</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pameran</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Informasi</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Portofolio</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Karir</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                    <ul class="text-gray-400 space-y-2">
                        <li>Email: info@eventpro.com</li>
                        <li>Telepon: +62 812-3456-7890</li>
                        <li>Alamat: Jl. Sudirman No. 123, Jakarta</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400 text-sm">
                &copy; 2024 EventPro. All Rights Reserved.
            </div>
        </div>
    </footer>
    
</body>
</html>