@extends('layouts.adminLayouts')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Buat Pengumuman Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            <form action="{{ route('pengumuman.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="judul">Judul Pengumuman</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                           id="judul" name="judul" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="konten">Isi Konten</label>
                    <input id="konten" type="hidden" name="konten" value="{{ old('konten') }}">
                    <trix-editor input="konten" class="@error('konten') is-invalid @enderror"></trix-editor>
                    @error('konten')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publish (Terbitkan)</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft (Simpan Dulu)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="kategori">Kategori (Opsional)</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" value="{{ old('kategori') }}" placeholder="Contoh: Info Lomba">
                        </div>
                    </div>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="is_pinned" name="is_pinned" value="1" {{ old('is_pinned') ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_pinned">
                        Sematkan (Pin) Pengumuman ini
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pengumuman</button>
                <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</div>
@endsection
