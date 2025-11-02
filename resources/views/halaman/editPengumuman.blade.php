@extends('layouts.adminLayouts')

@section('content')
{{-- 'container-fluid' (Bootstrap) -> 'px-6 py-4' (Tailwind) --}}
<div class="px-6 py-4">

    {{-- 'h3 mb-4' (BS 1.5rem) -> 'text-2xl font-bold mb-6' (TW 1.5rem) --}}
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Pengumuman</h1>

    {{-- 'card shadow mb-4' (Bootstrap) -> Styling kartu Tailwind --}}
    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">
        {{-- 'card-body' (Bootstrap) -> 'p-8' (Tailwind) untuk padding formulir --}}
        <div class="p-8">

            {{--
                'space-y-6' menggantikan 'form-group' untuk memberi jarak
                vertikal yang konsisten antar field.
            --}}
            <form action="{{ route('pengumuman.update', $pengumuman->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- FIELD 1: Judul Pengumuman --}}
                <div>
                    {{-- Style label standar Tailwind --}}
                    <label for="judul" class="block text-sm font-medium mb-1 text-gray-700">Judul Pengumuman</label>
                    {{--
                        'form-control' -> Style input Tailwind
                        'is-invalid' -> Diganti dengan kelas kondisional @error
                    --}}
                    <input type="text"
                           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('judul') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                           id="judul" name="judul" value="{{ old('judul', $pengumuman->judul) }}" required>

                    {{-- 'invalid-feedback' -> Style pesan error Tailwind --}}
                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- FIELD 2: Isi Konten (Trix Editor) --}}
                <div>
                    <label for="konten" class="block text-sm font-medium mb-1 text-gray-700">Isi Konten</label>
                    <input id="konten" type="hidden" name="konten" value="{{ old('konten', $pengumuman->konten) }}">
                    <trix-editor input="konten"
                                 class="block w-full border-gray-300 rounded-md shadow-sm @error('konten') border border-red-500 @enderror"></trix-editor>

                    {{-- 'invalid-feedback d-block' -> Style pesan error Tailwind --}}
                    @error('konten')
                        <p class="mt-1 text-sm text-red-600 block">{{ $message }}</p>
                    @enderror
                </div>

                {{--
                    'row' (Bootstrap) -> 'grid' (Tailwind)
                    - 'grid-cols-1': 1 kolom di HP
                    - 'md:grid-cols-2': 2 kolom di desktop
                    - 'gap-6': Jarak antar kolom
                --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Kolom 1: Status --}}
                    <div>
                        <label for="status" class="block text-sm font-medium mb-1 text-gray-700">Status</label>
                        {{-- 'form-control' (select) -> Style select Tailwind --}}
                        <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="status" name="status" required>
                            <option value="published" {{ old('status', $pengumuman->status) == 'published' ? 'selected' : '' }}>Publish (Terbitkan)</option>
                            <option value="draft" {{ old('status', $pengumuman->status) == 'draft' ? 'selected' : '' }}>Draft (Simpan Dulu)</option>
                        </select>
                    </div>

                    {{-- Kolom 2: Kategori --}}
                    <div>
                        <label for="kategori" class="block text-sm font-medium mb-1 text-gray-700">Kategori (Opsional)</label>
                        <input type="text"
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               id="kategori" name="kategori" value="{{ old('kategori', $pengumuman->kategori) }}" placeholder="Contoh: Info Lomba">
                    </div>
                </div>

                {{--
                    'form-group form-check' (Bootstrap) -> 'flex items-center' (Tailwind)
                --}}
                <div class="flex items-center">
                    {{-- Style checkbox Tailwind --}}
                    <input type="checkbox"
                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                           id="is_pinned" name="is_pinned" value="1" {{ old('is_pinned', $pengumuman->is_pinned) ? 'checked' : '' }}>
                    {{-- Style label checkbox Tailwind --}}
                    <label class="ml-2 block text-sm text-gray-700" for="is_pinned">
                        Sematkan (Pin) Pengumuman ini
                    </label>
                </div>

                {{-- Wrapper Tombol --}}
                <div class="flex items-center gap-4">
                    {{-- 'btn btn-primary' -> Tombol primary Tailwind --}}
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                        Update Pengumuman
                    </button>
                    {{-- 'btn btn-secondary' -> Tombol secondary Tailwind --}}
                    <a href="{{ route('pengumuman.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
