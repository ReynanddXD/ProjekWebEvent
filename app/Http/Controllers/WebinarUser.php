<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserWebinar;
use App\Models\Webinar;
class WebinarUser extends Controller
{

    public function create(){
      $kategoriWebinar = Webinar::all(); // ambil semua data dari tabel lombas
      return view('form.formUserWebinar', compact('kategoriWebinar'));
    }

      public function showKategori(){
         
      }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email',
            'noHp'      => 'required|string|max:20',
            'instansi'  => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'webinar_id'=> 'required|exists:webinars,id',
        ]);

        // ✅ Ambil user_id tanpa menggunakan auth()->id() atau user()
        $userId = session()->get(Auth::getName());
        $validatedData['user_id'] = $userId;

        // ✅ Cek apakah user sudah mendaftar webinar ini sebelumnya
        $sudahTerdaftar = UserWebinar::where('user_id', $userId)
            ->where('webinar_id', $request->webinar_id)
            ->exists();

        if ($sudahTerdaftar) {
            return redirect()->route('uwebinar.create')
                ->with('error', 'Anda sudah terdaftar di webinar ini sebelumnya.');
        }

        // ✅ Ambil data webinar
        $webinar = Webinar::findOrFail($request->webinar_id);

        // ✅ Jika webinar berbayar
        if ($webinar->harga > 0) {
            // Simpan data sementara di session dan arahkan ke pembayaran
            session(['pendaftaran_webinar' => $validatedData]);
            return redirect()->route('payment.webinar.checkout', ['webinar_id' => $webinar->id]);
        }

        // ✅ Jika webinar gratis → simpan ke database langsung
        UserWebinar::create($validatedData);

        return redirect()->route('uwebinar.create')
            ->with('success', 'Pendaftaran webinar berhasil!');
    }
}
