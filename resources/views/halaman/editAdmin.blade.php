@extends('layouts.adminLayouts')

@section('content')
{{-- 'container-fluid' (Bootstrap) -> 'px-6 py-4' (Tailwind) --}}
<div class="px-6 py-4">

    {{-- 'h3 mb-4' (BS 1.5rem) -> 'text-2xl font-bold mb-6' (TW 1.5rem) --}}
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Admin Baru</h1>

    {{-- 'card shadow mb-4' (Bootstrap) -> Styling kartu Tailwind --}}
    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">

        <div class="p-8">

            @if ($errors->any())

                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-6" role="alert">

                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="text-gray-700 space-y-6">
                @csrf
@method('PUT')

                <div>
                    {{-- Style label standar Tailwind --}}
                    <label for="name" class="block text-sm font-medium mb-1">Nama Lengkap</label>

                    <input type="text" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="name" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                {{-- FIELD 2: Alamat Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">Alamat Email</label>
                    <input type="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                {{-- FIELD 3: Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="password" name="password">
                </div>

                {{-- FIELD 4: Konfirmasi Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium mb-1">Konfirmasi Password</label>
                    <input type="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           id="password_confirmation" name="password_confirmation">
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
                        Simpan Perubahan
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
