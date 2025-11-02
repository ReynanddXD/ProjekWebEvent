<?php

namespace App\Http\Controllers;
use App\Models\Lomba;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboarduserController extends Controller
{
public function index()
    {
        // 1. Ambil data user yang sedang login
        $user = Auth::user();

        // 2. Ambil lomba yang diikuti user melalui relasi lombaDiikuti()
        // Menggunakan latest() untuk mengurutkan berdasarkan waktu pembuatan di pivot table (jika ada)
        // atau waktu pembuatan lomba (tergantung implementasi)
        // Eager loading bisa ditambahkan untuk performa, misal: $user->lombaDiikuti()->latest()->get();
        $lombaDiikuti = $user->lombaDiikuti()->latest()->get();

        // 3. Ambil semua webinar (diperlukan jika Anda ingin menambahkan bagian webinar di view)
        $semuaWebinar = Webinar::latest()->get();

        // 4. Kirim data ke view
        return view('halaman.user.dashboarduser', compact('lombaDiikuti', 'semuaWebinar'));
    }


    // Halaman Pengumuman
    public function pengumuman(){
        return view('halaman.user.pengumumanUser');
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
}
