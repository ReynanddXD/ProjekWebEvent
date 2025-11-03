<?php

namespace App\Http\Controllers;
use App\Models\Lomba;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengumuman;
use App\Models\UserLomba;
use App\Models\UserWebinar;

use Illuminate\Http\Request;

class DashboarduserController extends Controller
{
 public function index()
    {
        $user = Auth::user(); //dapatin data user yg lagi login

        $userId = $user->id; //gunakan untuk webinar
        $userEmail = $user->email; //gunakna untuk lomba

        // Ambil data lomba dan webinar berdasarkan user_id
      $lombas = UserLomba::with('lomba')->where('email', $userEmail)->get();
        $webinars = UserWebinar::with('webinar')->where('user_id', $userId)->get();

        return view('halaman.user.dashboardUser', compact('lombas', 'webinars'));
    }


    public function pengumuman()
    {
        // Ambil semua pengumuman yang statusnya 'publish', urut dari terbaru
        $pengumumans = Pengumuman::where('status', 'published')
                            ->orderBy('created_at', 'desc')
                            ->get();

        // Kirim data ke view 'halaman.user.pengumumanUser'
        return view('halaman.user.pengumumanUser', compact('pengumumans'));
    }

    /**
     * Menampilkan detail pengumuman
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::findOrFail($id);

        return view('halaman.user.pengumumanDetail', compact('pengumuman'));
    }

    // Halaman Lomba
    public function lomba(){
        $semuaLomba = Lomba::latest()->get();
        return view('halaman.user.lombaUser', compact('semuaLomba'));
    }

    // Halaman Seminar (Webinar)
    public function seminar(){
        $semuaWebinar = Webinar::latest()->get();
        return view('halaman.user.seminarUser', compact('semuaWebinar'));
    }

    // Edit Profile User
    public function edit()
    {
        $user = Auth::user(); // ambil data user yang sedang login
        return view('halaman.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:6|confirmed',
            'no_hp' => 'nullable|string',
            'instansi' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',

        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->instansi = $request->instansi;
        $user->pekerjaan = $request->pekerjaan;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
}
