<!-- resources/views/partials/footer.blade.php -->

<footer class="bg-gray-900 text-gray-400 py-12">
<div class="max-w-6xl mx-auto px-6 lg:px-8">
<!-- Struktur Utama: Flex Container di Desktop -->
<div class="flex flex-col items-center justify-between space-y-8 md:flex-row md:space-y-0">

        <!-- 1. Logo dan Brand (Simpel) -->
        <div class="flex items-center gap-3">
            <i class="fas fa-bolt text-yellow-400 text-2xl"></i> 
            <span class="text-xl font-extrabold text-white tracking-wider">MYREADY</span>
        </div>
        
        <!-- 2. Navigasi Minimalis (Di tengah) -->
        <nav class="flex flex-wrap justify-center gap-x-8 gap-y-2 font-medium text-sm">
            <a href="#home" class="hover:text-indigo-400 transition">Home</a>
            <a href="#lomba" class="hover:text-indigo-400 transition">Lomba</a>
            <a href="#webinar" class="hover:text-indigo-400 transition">Webinar</a>
            <a href="#contact" class="hover:text-indigo-400 transition">Kontak</a>
            <a href="#" class="hover:text-indigo-400 transition">Kebijakan Privasi</a>
        </nav>
        
        <!-- 3. Sosial Media (Simpel) -->
        <div class="flex space-x-5 text-xl">
            <a href="#" class="hover:text-indigo-400 transition" aria-label="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="hover:text-indigo-400 transition" aria-label="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="hover:text-indigo-400 transition" aria-label="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </div>

    <!-- Garis Pemisah dan Hak Cipta -->
    <div class="mt-10 border-t border-gray-800 pt-6 text-center text-xs">
        © 2025 <span class="font-semibold text-white">MyReady</span>. All rights reserved. Platform Event.
    </div>
</div>

</footer>