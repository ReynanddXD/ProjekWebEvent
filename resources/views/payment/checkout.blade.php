@extends('layouts.mainUser')
@section('title', 'Checkout Pembayaran')
@section('content')
<div class="ml-64 p-6 flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4">Checkout Pembayaran</h2>
        <p class="mb-4">Lomba: <strong>{{ $lomba->lomba }}</strong></p>
        <p class="mb-4">Harga: <strong>Rp {{ number_format($lomba->harga, 0, ',', '.') }}</strong></p>

        <form action="{{ route('payment.success') }}" method="GET">
            <button type="submit" 
                    class="w-full px-5 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                Bayar Sekarang
            </button>
        </form>

        <a href="{{ route('ulomba.create') }}" class="mt-4 block text-center text-gray-600 hover:underline">
            Batal dan kembali
        </a>
    </div>
</div>
@endsection
