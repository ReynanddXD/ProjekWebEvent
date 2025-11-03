@php
use Illuminate\Support\Facades\Auth;
@endphp
<nav class="bg-[#ffffff] border-b border-gray-200 shadow-sm">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

      {{-- TOMBOL AVATAR PENGGUNA --}}
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        {{--
          PERUBAHAN DI SINI:
          Tombol ini kosong, saya tambahkan ikon pengguna SVG sebagai placeholder.
          Ganti ini dengan <img ...> jika Anda punya gambar avatar.
        --}}
        <svg class="w-8 h-8 text-white p-1 rounded-full" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 18a8 8 0 1 1 8-8 8.009 8.009 0 0 1-8 8Zm0-14a4 4 0 1 0 4 4 4 4 0 0 0-4-4Zm0 6a3 3 0 1 1 3-3 3 3 0 0 1-3 3Zm0 3a6 6 0 0 0-6 6 1 1 0 0 0 2 0 4 4 0 0 1 8 0 1 1 0 0 0 2 0 6 6 0 0 0-6-6Z"/>
        </svg>
      </button>


      <p class="ml-3 text-[#1E3A8A] font-medium">Hai! Welcome back {{ Auth::user()->name }}!</p>




    </div>
  </div>
</nav>
