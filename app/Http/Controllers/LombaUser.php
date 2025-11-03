<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\userLomba;
use Illuminate\Support\Facades\Auth;

class LombaUser extends Controller
{
  public function showKategori(){
    $kategoriLomba = Lomba::all(); // ambil semua data dari tabel lombas
    return view('form.formUserLomba', compact('kategoriLomba'));
}

    public function index(){
    $userLomba = UserLomba::latest()->get();
    return view('form.formUserLomba', compact('userLomba'));
}


    public function create(){
    $kategoriLomba = Lomba::all(); // ambil semua data lomba
    return view('form.formUserLomba', compact('kategoriLomba'));


    }

      public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'noHp' => 'required|string|max:20',
            'instansi' => 'required|string|max:255',
            'lomba_id' => 'required|exists:lombas,id',
            'pekerjaan' => 'required|string|max:255',
        ]);

        // ✅ Ambil user_id dari session tanpa auth()->id() atau user()
        // $userId = session()->get(Auth::getName());
        // $validatedData['user_id'] = $userId;

        // Cek apakah user sudah mendaftar lomba ini sebelumnya
        $sudahTerdaftar = \App\Models\UserLomba::where('email', $validatedData['email'])
            ->where('lomba_id', $request->lomba_id)
            ->exists();

        if ($sudahTerdaftar) {
            return redirect()->route('ulomba.create')
                ->with('error', 'Anda sudah mendaftar lomba ini sebelumnya.');
        }

        // Ambil detail lomba
        $lomba = \App\Models\Lomba::findOrFail($request->lomba_id);

        if ($lomba->harga > 0) {
            // Jika berbayar → simpan ke session dan redirect ke pembayaran
            session(['pendaftaran_lomba' => $validatedData]);
            return redirect()->route('payment.checkout', ['lomba_id' => $lomba->id]);
        } else {
            // Jika gratis → langsung simpan ke database
            \App\Models\UserLomba::create($validatedData);
            return redirect()->route('ulomba.create')->with('success', 'Pendaftaran lomba berhasil!');
        }
    }


  // Halaman checkout
    public function checkout($lomba_id)
    {
        $lomba = Lomba::findOrFail($lomba_id);
        $pendaftaran = session('pendaftaran_lomba');

        if (!$pendaftaran) {
            return redirect()->route('ulomba.create')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        // Tampilkan halaman checkout
        return view('payment.checkout', compact('lomba', 'pendaftaran'));
    }

    // Proses sukses pembayaran
    public function success(Request $request)
    {
        $pendaftaran = session('pendaftaran_lomba');

        if (!$pendaftaran) {
            return redirect()->route('ulomba.create')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        // Simpan data ke database setelah pembayaran sukses
        UserLomba::create($pendaftaran);

        // Hapus session setelah disimpan
        session()->forget('pendaftaran_lomba');

        return redirect()->route('ulomba.create')->with('success', 'Pembayaran berhasil! Pendaftaran Anda telah tersimpan.');
    }

}
