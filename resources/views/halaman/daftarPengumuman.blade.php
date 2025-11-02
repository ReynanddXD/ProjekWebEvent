@extends('layouts.app') @section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Manajemen Pengumuman</h1>
    <p class="mb-4">Daftar semua pengumuman yang ada di sistem.</p>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Buat Pengumuman Baru
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengumuman</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Kategori</th>
                            <th>Pinned</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($daftarPengumuman as $item)
                        <tr>
                            <td>{{ $item->judul }}</td>
                            <td>
                                @if($item->status == 'published')
                                    <span class="badge badge-success">Published</span>
                                @else
                                    <span class="badge badge-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $item->kategori ?? '-' }}</td>
                            <td>
                                @if($item->is_pinned)
                                    <span class="badge badge-info">Ya</span>
                                @else
                                    <span class="badge badge-light">Tidak</span>
                                @endif
                            </td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('pengumuman.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada pengumuman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
