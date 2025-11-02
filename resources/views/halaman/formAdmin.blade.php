@extends('layouts.adminLayouts')

@section('content')
{{-- 'container-fluid' (Bootstrap) -> 'px-6 py-4' (Tailwind) --}}
<div class="px-6 py-4">

    {{-- 'h3 mb-4' (BS 1.5rem) -> 'text-2xl font-bold mb-6' (TW 1.5rem) --}}
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Admin Baru</h1>

    {{-- 'card shadow mb-4' (Bootstrap) -> Styling kartu Tailwind --}}
    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">
        {{--
            'card-body' (Bootstrap) -> 'p-6' atau 'p-8'
            Saya gunakan 'p-8' (2rem) di sini agar formulir memiliki
            ruang napas yang lebih lega.
        --}}
        <div class="p-8">

            @if ($errors->any())
                {{-- 'alert alert-danger' (Bootstrap) -> Notifikasi error Tailwind --}}
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6" role="alert">
                    {{-- 'list-disc list-inside' untuk membuat bullet points --}}
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{--
                Ini adalah cara modern Tailwind untuk styling form.
                - 'space-y-6': Ini adalah 'magic'nya.
                  Secara otomatis menambahkan margin-top 1.5rem (mb-6)
                  di antara setiap <div> di dalam form ini.
                  Kita tidak perlu lagi kelas 'form-group' atau 'mb-4'
                  di setiap field.
            --}}
            <form action="{{ route('admin.users.store') }}" method="POST" class="text-gray-700 space-y-6">
                @csrf

                {{-- FIELD 1: Nama Lengkap --}}
                {{--
                    Kita tidak perlu 'form-group' lagi, cukup <div> standar.
                    'space-y-6' dari <form> akan memberi jarak.
                --}}
                <div>
                    {{-- Style label standar Tailwind --}}
                    <label for="name" class="block text-sm font-medium mb-1">Nama Lengkap</label>
                    {{--
                        'form-control' (Bootstrap) -> Style input standar Tailwind
                        - 'block w-full': 100% width
                        - 'border-gray-300 rounded-md': Border dan radius
                        - 'focus:ring-blue-500...': Efek highlight biru saat diklik/focus
                    --}}
                    <input type="text" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="name" name="name" value="{{ old('name') }}" required>
                </div>

                {{-- FIELD 2: Alamat Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Alamat Email</label>
                    <input type="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="email" name="email" value="{{ old('email') }}" required>
                </div>

                {{-- FIELD 3: Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="password" name="password" required>
                </div>

                {{-- FIELD 4: Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                    <input type="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="password_confirmation" name="password_confirmation" required>
                </div>

                {{--
                    Wrapper untuk tombol agar sejajar.
                    'space-y-6' dari <form> juga akan memberi jarak
                    pada div ini dari field terakhir.
                --}}
                <div class="flex items-center gap-4">
                    {{-- 'btn btn-primary' (Bootstrap) -> Tombol primary Tailwind --}}
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                        Simpan Admin Baru
                    </button>

                    {{-- 'btn btn-secondary' (Bootstrap) -> Tombol secondary Tailwind --}}
                    <a href="{{ route('admin.users.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
