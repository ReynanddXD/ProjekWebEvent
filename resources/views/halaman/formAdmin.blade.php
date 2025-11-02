@extends('layouts.adminLayouts')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambah Admin Baru</h1>

    <div class="card shadow mb-4">
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST" class="text-gray-700">
                @csrf <div class="form-group  ">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control border-2" id="name" name="name"
                           value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input type="email" class="form-control border-2" id="email" name="email"
                           value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control border-2" id="password"
                           name="password" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control border-2"
                           id="password_confirmation" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary border-2">Simpan Admin Baru</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary bg-amber-900">Batal</a>
            </form>

        </div>
    </div>

</div>
@endsection
