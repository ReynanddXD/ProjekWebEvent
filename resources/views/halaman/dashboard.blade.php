@extends('layouts.adminLayouts')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h2 class="mb-4">Selamat Datang di Dashboard Admin! tes</h2>

        <div class="row">
            {{-- Kartu untuk Manajemen Lomba --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Lomba</h5>
                        <p class="card-text">Lihat, tambah, edit, dan hapus semua data lomba yang sudah masuk ke dalam sistem.</p>

                        {{-- INI CARA YANG BENAR: Buat link ke halaman tabel lomba --}}
                        <a href="{{ route('lomba.index') }}" class="btn btn-primary">Lihat Tabel Lomba</a>
                    </div>
                </div>
            </div>

            {{-- Kartu untuk Manajemen Webinar (jika ada) --}}
            {{-- <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Webinar</h5>
                        <p class="card-text">Kelola semua data webinar yang akan, sedang, atau telah dilaksanakan.</p>
                        <a href="{{ route('webinars.index') }}" class="btn btn-primary">Lihat Tabel Webinar</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
