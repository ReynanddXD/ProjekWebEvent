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
     <img class="w-5 h-5 bg-white" src="{{ asset('img/profile.svg') }}">
      </button>


      <p class="ml-3 text-[#1E3A8A] font-medium">Hai! Welcome back {{ Auth::user()->name }}!</p>




    </div>
  </div>
</nav>
