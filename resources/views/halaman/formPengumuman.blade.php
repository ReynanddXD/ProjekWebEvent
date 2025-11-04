@extends('layouts.adminLayouts')

@section('content')

<div class="px-6 py-4">

    <h1 class="text-2xl font-bold mb-6 text-gray-800">Buat Pengumuman Baru</h1>


    <div class="bg-white overflow-hidden shadow-lg rounded-lg mb-6">

        <div class="p-8">


            <form action="{{ route('pengumuman.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- FIELD 1: Judul Pengumuman --}}
                <div>

                    <label for="judul" class="block text-sm font-medium mb-1 text-gray-700">Judul Pengumuman</label>

                    <input type="text"
                           class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('judul') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror"
                           id="judul" name="judul" value="{{ old('judul') }}" required>


                    @error('judul')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- FIELD 2: Isi Konten (Trix Editor) --}}
                <div>
                    <label for="konten" class="block text-sm font-medium mb-1 text-gray-700">Isi Konten</label>
                    <input id="konten" type="hidden" name="konten" value="{{ old('konten') }}">

                    <trix-editor input="konten"
                                 class="block w-full border-gray-300 rounded-md shadow-sm @error('konten') border border-red-500 @enderror"></trix-editor>

                    {{-- 'invalid-feedback d-block' -> Style pesan error Tailwind --}}
                    @error('konten')
                        <p class="mt-1 text-sm text-red-600 block">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Kolom 1: Status --}}
                    <div>
                        <label for="status" class="block text-sm font-medium mb-1 text-gray-700">Status</label>
                        {{-- 'form-control' (select) -> Style select Tailwind --}}
                        <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                id="status" name="status" required>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publish (Terbitkan)</option>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Simpan Dulu)</option>
                        </select>
                    </div>

                    {{-- Kolom 2: Kategori --}}
                    <div>
                        <label for="kategori" class="block text-sm font-medium mb-1 text-gray-700">Kategori (Opsional)</label>
                        <input type="text"
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                               id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder="Contoh: Info Lomba">
                    </div>
                </div>

                <div class="flex items-center">
                    {{-- Style checkbox Tailwind --}}
                    <input type="checkbox"
                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                           id="is_pinned" name="is_pinned" value="1" {{ old('is_pinned') ? 'checked' : '' }}>
                    {{-- Style label checkbox Tailwind --}}
                    <label class="ml-2 block text-sm text-gray-700" for="is_pinned">
                        Sematkan (Pin) Pengumuman ini
                    </label>
                </div>

                {{-- Wrapper Tombol --}}
                <div class="flex items-center gap-4">

                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                        Simpan Pengumuman
                    </button>

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
