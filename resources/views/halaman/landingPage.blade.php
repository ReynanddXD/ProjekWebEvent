<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MYREADY | Lomba & Event</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg fixed top-0 w-full z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-2">
                <img src="{{ asset('images/myready-logo.png') }}" alt="MYREADY" class="h-10">
                <span class="sr-only">MYREADY</span>
            </a>
            
            <!-- Menu -->
            <ul class="hidden md:flex space-x-6 font-medium">
                <li><a href="#home" class="hover:text-[#FACC15] transition">Home</a></li>
                <li><a href="#lomba" class="hover:text-[#FACC15] transition">Lomba</a></li>
                <li><a href="#webinar" class="hover:text-[#FACC15] transition">Webinar</a></li>
                <li><a href="#about" class="hover:text-[#FACC15] transition">About</a></li>
                <li><a href="#contact" class="hover:text-[#FACC15] transition">Contact</a></li>
            </ul>

            <!-- Auth Buttons -->
            <div class="space-x-4">
                <a href="{{ route('login') }}" 
                   class="px-4 py-2 bg-[#1E3A8A] text-white rounded-lg shadow hover:bg-[#3B82F6]">Login</a>
                <a href="{{ route('register') }}" 
                   class="px-4 py-2 bg-[#FACC15] text-[#1E3A8A] rounded-lg shadow hover:bg-yellow-400">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative flex flex-col justify-center items-center text-center h-screen text-white overflow-hidden">
        <!-- Background Gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-[#1E3A8A] via-[#3B82F6] to-[#FACC15] opacity-95"></div>
        
        <!-- Content -->
        <div class="relative z-10 px-6">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">
                Selamat Datang di <span class="text-[#FACC15]">MYREADY</span>
            </h1>
            <p class="text-lg md:text-xl mb-6 max-w-2xl mx-auto">
                Ikuti berbagai lomba dan webinar untuk mengembangkan skill
            </p>
            <a href="#lomba" 
               class="px-6 py-3 bg-white text-[#1E3A8A] font-semibold rounded-lg shadow hover:bg-gray-100">
               Mulai Jelajahi
            </a>
        </div>
    </section>

    <!-- Section Lomba -->
    <section id="lomba" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-[#1E3A8A]">Lomba Populer</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-[#FACC15] hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-2">Lomba Desain Grafis</h3>
                <p class="text-gray-600 mb-4">Tunjukkan kreativitasmu dalam desain dengan tema terbaru.</p>
                <a href="#" class="text-[#1E3A8A] font-medium hover:underline">Daftar Sekarang →</a>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-[#FACC15] hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-2">Lomba Coding</h3>
                <p class="text-gray-600 mb-4">Uji kemampuan problem solving dengan tantangan pemrograman.</p>
                <a href="#" class="text-[#1E3A8A] font-medium hover:underline">Daftar Sekarang →</a>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-[#FACC15] hover:shadow-xl transition">
                <h3 class="text-xl font-semibold mb-2">Lomba Fotografi</h3>
                <p class="text-gray-600 mb-4">Abadikan momen terbaik dengan kreativitasmu.</p>
                <a href="#" class="text-[#1E3A8A] font-medium hover:underline">Daftar Sekarang →</a>
            </div>
        </div>
    </section>

    <!-- Section Webinar -->
    <section id="webinar" class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-[#1E3A8A]">Webinar Terkini</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-[#3B82F6] hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Webinar Digital Marketing</h3>
                    <p class="text-gray-600 mb-4">Pelajari strategi pemasaran digital terbaru bersama expert.</p>
                    <a href="#" class="text-[#1E3A8A] font-medium hover:underline">Ikuti Webinar →</a>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 border-l-4 border-[#3B82F6] hover:shadow-xl transition">
                    <h3 class="text-xl font-semibold mb-2">Webinar Data Science</h3>
                    <p class="text-gray-600 mb-4">Pahami dasar data science dan peluang karirnya.</p>
                    <a href="#" class="text-[#1E3A8A] font-medium hover:underline">Ikuti Webinar →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="container mx-auto px-6 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-[#1E3A8A]">Tentang Kami</h2>
        <p class="text-gray-700 text-center max-w-3xl mx-auto leading-relaxed">
            MYREADY hadir sebagai solusi bagi pelajar, mahasiswa, hingga profesional 
            yang ingin mengikuti lomba dan webinar berkualitas. Kami percaya bahwa 
            setiap orang memiliki potensi besar, dan melalui event yang tepat, 
            potensi itu bisa berkembang dan berdampak positif bagi masyarakat.
        </p>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="bg-[#1E3A8A] text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Hubungi Kami</h2>
            <p class="mb-8">Ada pertanyaan atau ingin bekerja sama? Silakan hubungi kami.</p>
            <a href="mailto:info@myready.com" 
               class="px-6 py-3 bg-[#FACC15] text-[#1E3A8A] font-semibold rounded-lg shadow hover:bg-yellow-400">
               Email Kami
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#1E3A8A] text-gray-200 py-6 mt-auto">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center">
            <p>&copy; 2025 MYREADY. All rights reserved.</p>
            <div class="space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-[#FACC15]">Privacy Policy</a>
                <a href="#" class="hover:text-[#FACC15]">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>
