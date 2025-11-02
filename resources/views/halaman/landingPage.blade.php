<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYREADY | Lomba & Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=2">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Custom color for Dark Indigo (#1E3A8A) */
        .bg-dark-indigo { background-color: #1E3A8A !important; }
        .text-dark-indigo { color: #1E3A8A !important; }
        .border-dark-indigo { border-color: #1E3A8A; }
        /* Custom color for Amber Accent (#FACC15) */
        .bg-amber-400-custom { background-color: #FACC15; }
        .text-amber-400-custom { color: #b89300; }
        
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .bg-cover-center {
            background-size: cover;
            background-position: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">
    
    @include('partial.navbar')
    
    <section id="home" class="relative flex flex-col justify-center items-center text-center min-h-screen text-white overflow-hidden">
        
        <div id="hero-background-1" class="absolute inset-0 bg-cover-center transition-opacity duration-1000 opacity-100"></div>

        <div id="hero-background-2" class="absolute inset-0 bg-cover-center transition-opacity duration-1000 opacity-0"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-dark-indigo via-indigo-700 to-amber-400-custom opacity-70"></div>
        
        <div class="relative z-10 px-6 py-20">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">
                <a href="#home" class="hover:text-yellow-400 transition-colors duration-300">
                    Ayo Belajar Bareng di <span style="color: rgb(222, 222, 2);">MYREADY</span>
                </a>
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto font-medium">
                <a href="#lomba" class="hover:text-gray-200 transition-colors duration-300">
                    Ikuti berbagai lomba dan webinar untuk mengembangkan skill dan potensi diri Anda.
                </a>
            </p>
            <a href="#lomba" 
            class="px-8 py-4 bg-white text-dark-indigo font-bold rounded-full shadow-2xl 
                    hover:bg-dark-indigo 
                    transition duration-300 transform hover:scale-105">
                Mulai Jelajahi Event
            </a>
        </div>
    </section>

    {{-- Lomba --}}
    <section id="lomba" class="container mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-16 text-dark-indigo">
            <a href="#lomba" class="hover:text-blue-700 transition-colors duration-300">
                Lomba Populer Pilihan
            </a>
        </h2>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($lombas as $lomba)
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 flex flex-col">
                    <a href="{{ route('dashboardUser') }}" class="flex flex-col h-full">
                        <img src="{{ asset('storage/' . $lomba->gambar) }}" 
                            alt="{{ $lomba->lomba }}" 
                            class="w-full h-40 object-cover">

                        {{-- isi card pakai flex-grow supaya deskripsi fleksibel --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">
                                {{ $lomba->lomba }}
                            </h3>
                            <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300 flex-grow">
                                {{ $lomba->deskripsi }}
                            </p>

                            {{-- tombol selalu di bawah --}}
                            <span class="text-amber-400-custom font-semibold hover:underline flex items-center mt-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                                Daftar Sekarang
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Webinar --}}
    <section id="webinar" class="bg-dark-indigo py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16 text-white">
                <a href="#webinar" class="hover:text-gray-200 transition-colors duration-300">
                    Webinar Terkini dan Eksklusif
                </a>
            </h2>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($webinars as $webinar)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                        <a href="{{ route('dashboardUser') }}">
                            <img src="{{ asset('storage/' . $webinar->gambar) }}" 
                                alt="{{ $webinar->webinar }}" 
                                class="w-full h-40 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">
                                    {{ $webinar->webinar }}
                                </h3>
                                <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">
                                    {{ $webinar->deskripsiWebinar }}
                                </p>
                                <span class="text-amber-400-custom font-semibold hover:underline flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                                        <path d="M15 7v2a4 4 0 01-4 4H9.847l-1 1H11a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2v.228A4 4 0 017 8v5a2 2 0 002 2h2.153l1 1H15a2 2 0 002-2v-4a2 2 0 00-2-2z" />
                                    </svg>
                                    Ikuti Webinar
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About --}}
    <section id="about" class="container mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-dark-indigo">
            <a href="#about" class="hover:text-blue-700 transition-colors duration-300">
                Tentang Kami
            </a>
        </h2>
        <p class="text-gray-700 text-center max-w-4xl mx-auto leading-relaxed text-lg">
            <a href="#about" class="hover:text-gray-900 transition-colors duration-300">
                MYREADY hadir sebagai platform terdepan bagi pelajar, mahasiswa, hingga profesional 
                yang ingin mencari dan mengikuti lomba dan webinar berkualitas di berbagai bidang. 
                Kami percaya bahwa setiap orang memiliki potensi besar, dan melalui event yang tepat, 
                potensi itu bisa berkembang dan berdampak positif bagi masa depan karir Anda.
            </a>
        </p>
    </section>

    {{-- Kontak --}}
    <section id="contact" class="bg-dark-indigo py-20 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-6 text-white">
                <a href="#contact" class="hover:text-gray-200 transition-colors duration-300">
                    Siap Bersinergi?
                </a>
            </h2>

            <p class="mb-10 text-gray-200 text-lg max-w-2xl mx-auto leading-relaxed">
                <a href="#contact" class="hover:text-white transition-colors duration-300">
                    Ada pertanyaan, ingin menjadi <em>partner</em> event, atau memberikan masukan?  
                    Silakan hubungi kami!
                </a>
            </p>

            <!-- Tombol membuka Gmail langsung ke menu Compose -->
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=2310631170114@student.unsika.ac.id&su=Bertanya/Saran/Kolaborasi"
            target="_blank"
            class="px-8 py-3 bg-amber-400-custom text-dark-indigo font-semibold rounded-lg shadow-lg 
                    hover:bg-yellow-400 transition duration-300 transform hover:scale-105">
                ✉️ Email Kami Sekarang
            </a>
        </div>
    </section>


    @include('partial.footer') 

    <script>
        // JAVASCRIPT UNTUK BACKGROUND IMAGE SLIDER
        const backgroundImages = [
            "{{ asset('img/bg1.jpg') }}",
            "{{ asset('img/bg3.jpg') }}",
            "{{ asset('img/bg2.jpg') }}"
        ];
        
        let currentImageIndex = 0;
        const bg1 = document.getElementById('hero-background-1');
        const bg2 = document.getElementById('hero-background-2');
        
        const intervalTime = 5000;
        
        let activeBackground = bg1;
        let inactiveBackground = bg2;

        function initBackground() {
            bg1.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
            bg2.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        }

        function changeBackground() {
            inactiveBackground.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
            activeBackground.style.opacity = '0';
            inactiveBackground.style.opacity = '1';
            [activeBackground, inactiveBackground] = [inactiveBackground, activeBackground];
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        }
        
        window.onload = function() {
            initBackground();
            setInterval(changeBackground, intervalTime);
        };

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

        // JAVASCRIPT UNTUK NAVBAR TRANSPARAN SAAT SCROLL
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            const scrollPosition = window.scrollY;

            // Jika posisi scroll lebih besar dari 50px, ubah warna navbar
            if (scrollPosition > 50) {
                navbar.classList.add('bg-dark-indigo', 'bg-opacity-90', 'shadow-lg');
                navbar.classList.remove('bg-transparent', 'text-white');
                navbar.classList.add('text-white'); // Memastikan teks tetap putih setelah transisi
            } else {
                // Jika kembali ke atas, kembalikan navbar ke transparan
                navbar.classList.remove('bg-dark-indigo', 'bg-opacity-90', 'shadow-lg');
                navbar.classList.add('bg-transparent', 'text-white');
            }
        });
    </script>
</body>
</html>