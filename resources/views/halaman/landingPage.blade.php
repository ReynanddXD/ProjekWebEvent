<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYREADY | Lomba & Event</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Custom color for Dark Indigo (#1E3A8A) */
        .bg-dark-indigo { background-color: #1E3A8A; }
        .text-dark-indigo { color: #1E3A8A; }
        .border-dark-indigo { border-color: #1E3A8A; }
        /* Custom color for Amber Accent (#FACC15) */
        .bg-amber-400-custom { background-color: #FACC15; }
        .text-amber-400-custom { color: #b89300; }
        
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        /* Hapus style lama untuk #hero-background */
        /* Style untuk kedua lapisan background baru */
        .bg-cover-center {
            background-size: cover;
            background-position: center;
        }
    </style>
    <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <section id="home" class="relative flex flex-col justify-center items-center text-center min-h-screen text-white overflow-hidden">
        
        <div id="hero-background-1" class="absolute inset-0 bg-cover-center transition-opacity duration-1000 opacity-100"></div>

        <div id="hero-background-2" class="absolute inset-0 bg-cover-center transition-opacity duration-1000 opacity-0"></div>

        <div class="absolute inset-0 bg-gradient-to-r from-dark-indigo via-indigo-700 to-amber-400-custom opacity-70"></div>
        
        <div class="relative z-10 px-6 py-20">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">
                <a href="#" class="hover:text-yellow-400 transition-colors duration-300">
                    Ayo Belajar Bareng di <span style="color: rgb(222, 222, 2);">MYREADY</span>
                </a>
            </h1>
            <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto font-medium">
                <a href="#" class="hover:text-gray-200 transition-colors duration-300">
                    Ikuti berbagai lomba dan webinar untuk mengembangkan skill dan potensi diri Anda.
                </a>
            </p>
            <a href="#lomba" 
               class="px-8 py-4 bg-white text-dark-indigo font-bold rounded-full shadow-2xl hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                Mulai Jelajahi Event
            </a>
        </div>
    </section>

    <section id="lomba" class="container mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-16 text-dark-indigo">
            <a href="#" class="hover:text-blue-700 transition-colors duration-300">
                Lomba Populer Pilihan
            </a>
        </h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <a href="#">
                    <img src="https://placehold.co/600x400/1E3A8A/ffffff?text=Design+Competition" alt="Lomba Desain Grafis" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">Lomba Desain Grafis</h3>
                        <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">Tunjukkan kreativitas visualmu dalam desain dengan tema terbaru dan menangkan hadiah jutaan.</p>
                        <span class="text-amber-400-custom font-semibold hover:underline flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            Daftar Sekarang
                        </span>
                    </div>
                </a>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <a href="#">
                    <img src="https://placehold.co/600x400/3B82F6/ffffff?text=Coding+Challenge" alt="Lomba Coding" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">Lomba Coding</h3>
                        <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">Uji kemampuan *problem solving* dan pemrograman Anda dengan tantangan algoritma.</p>
                        <span class="text-amber-400-custom font-semibold hover:underline flex items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            Daftar Sekarang
                        </span>
                    </div>
                </a>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <a href="#">
                    <img src="https://placehold.co/600x400/FACC15/1E3A8A?text=Photo+Contest" alt="Lomba Fotografi" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">Lomba Fotografi</h3>
                        <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">Abadikan momen terbaik dengan kreativitasmu dan menangkan kamera profesional.</p>
                        <span class="text-amber-400-custom font-semibold hover:underline flex items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            Daftar Sekarang
                        </span>
                    </div>
                </a>
            </div>
            
            <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                <a href="#">
                    <img src="https://placehold.co/600x400/1E3A8A/FACC15?text=Video+Editing" alt="Lomba Video Editing" class="w-full h-40 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">Lomba Video Editing</h3>
                        <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">Tantang diri Anda dalam merangkai cerita visual yang menarik dan sinematik.</p>
                        <span class="text-amber-400-custom font-semibold hover:underline flex items-center">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            Daftar Sekarang
                        </span>
                    </div>
                </a>
            </div>
            
        </div>
    </section>

    <section id="webinar" class="bg-dark-indigo py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-16 text-white">
                <a href="#" class="hover:text-gray-200 transition-colors duration-300">
                    Webinar Terkini dan Eksklusif
                </a>
            </h2>
            <div class="grid md:grid-cols-2 gap-8">
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <a href="#">
                        <img src="https://placehold.co/700x400/3B82F6/ffffff?text=Digital+Marketing+Webinar" alt="Webinar Digital Marketing" class="w-full h-40 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">Webinar Digital Marketing</h3>
                            <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">Pelajari strategi pemasaran digital terbaru bersama *expert* dan tingkatkan *engagement* Anda.</p>
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
                
                <div class="bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1">
                    <a href="#">
                        <img src="https://placehold.co/700x400/FACC15/1E3A8A?text=Data+Science+Masterclass" alt="Webinar Data Science" class="w-full h-40 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-dark-indigo hover:text-blue-700 transition-colors duration-300">Webinar Data Science</h3>
                            <p class="text-gray-600 mb-4 text-sm hover:text-gray-800 transition-colors duration-300">Pahami dasar *Data Science* dan peluang karirnya di era industri 4.0.</p>
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
            </div>
        </div>
    </section>

    <section id="about" class="container mx-auto px-6 py-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-dark-indigo">
            <a href="#" class="hover:text-blue-700 transition-colors duration-300">
                Tentang Kami
            </a>
        </h2>
        <p class="text-gray-700 text-center max-w-4xl mx-auto leading-relaxed text-lg">
            <a href="#" class="hover:text-gray-900 transition-colors duration-300">
                MYREADY hadir sebagai platform terdepan bagi pelajar, mahasiswa, hingga profesional 
                yang ingin mencari dan mengikuti **lomba dan webinar berkualitas** di berbagai bidang. 
                Kami percaya bahwa setiap orang memiliki potensi besar, dan melalui event yang tepat, 
                potensi itu bisa berkembang dan berdampak positif bagi masa depan karir Anda.
            </a>
        </p>
    </section>

    <section id="contact" class="bg-dark-indigo py-20 text-center text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold mb-6 text-white">
                <a href="#" class="hover:text-gray-200 transition-colors duration-300">
                    Siap Bersinergi?
                </a>
            </h2>

            <p class="mb-10 text-gray-200 text-lg max-w-2xl mx-auto leading-relaxed">
                <a href="#" class="hover:text-white transition-colors duration-300">
                    Ada pertanyaan, ingin menjadi <em>partner</em> event, atau memberikan masukan?  
                    Silakan hubungi kami!
                </a>
            </p>

            <a href="mailto:info@myready.com" 
            class="px-8 py-3 bg-amber-400-custom text-dark-indigo font-semibold rounded-lg shadow-lg 
                    hover:bg-yellow-400 transition duration-300 transform hover:scale-105">
                ✉️ Email Kami Sekarang
            </a>
        </div>
    </section>

    @include('partial.footer') 

    <script>
        const backgroundImages = [
            "{{ asset('img/bg1.jpg') }}",
            "{{ asset('img/bg3.jpg') }}",
            "{{ asset('img/bg2.jpg') }}"
        ];
        
        let currentImageIndex = 0;
        // Ambil kedua elemen background
        const bg1 = document.getElementById('hero-background-1');
        const bg2 = document.getElementById('hero-background-2');
        
        const intervalTime = 5000; // 8 detik total cycle time
        // Transisi CSS diatur ke 1000ms (1 detik)
        
        let activeBackground = bg1;
        let inactiveBackground = bg2;

        function initBackground() {
            // 1. Set gambar pertama pada bg1 (Aktif)
            bg1.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;

            // 2. Set gambar kedua pada bg2 (Tidak aktif/Tersembunyi)
            // Ini akan memastikan gambar berikutnya siap dimuat saat dibutuhkan
            bg2.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        }

        function changeBackground() {
            // 1. Siapkan background yang saat ini Inaktif dengan gambar berikutnya
            // Gambar ini akan menjadi Aktif di siklus berikutnya
            inactiveBackground.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;

            // 2. Cross-fade: Aktifkan yang Inaktif (opacity 1), Nonaktifkan yang Aktif (opacity 0)
            // Karena satu div ditumpuk di atas yang lain, transisi ini mulus tanpa jeda putih
            activeBackground.style.opacity = '0';
            inactiveBackground.style.opacity = '1';

            // 3. Tukar peran untuk siklus berikutnya
            [activeBackground, inactiveBackground] = [inactiveBackground, activeBackground];

            // 4. Maju ke indeks gambar berikutnya
            currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
        }
        
        // Initial load
        window.onload = function() {
            initBackground();
            // Mulai siklus rotasi, memanggil changeBackground() setiap 8 detik
            setInterval(changeBackground, intervalTime);
        };
    </script>
</body>
</html>