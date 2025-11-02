<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LombaUser;
use App\Http\Controllers\WebinarUser;
use App\Models\Lomba;
use App\Models\User;
use App\Models\userLomba;
use App\Models\userWebinar;
use App\Models\Webinar;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index(){
        $jumlahLomba = Lomba::count();
        $jumlahWebinar = Webinar::count();
        $jumlahAdmin = User::where('role', 'admin')->count();

        $totalPendaftarLomba = userLomba::count();
        $totalPendaftarWebinar = userWebinar::count();

        $totalPendaftar = $totalPendaftarLomba+$totalPendaftarWebinar;

        $lombas = Lomba::select('lomba as judul', 'created_at', 'id')
        ->latest() //mengurutkan descending
        ->take(5)
        ->get()
        ->map(function($item){
            $item->tipe = 'lomba';
                        $item->url = route('lomba.index'); // Asumsi link ke tabel lomba
                        return $item;
        });
       $webinars = Webinar::select('webinar as judul', 'created_at', 'id')
                        ->latest()
                        ->take(5)
                        ->get()
                        ->map(function ($item) {
                            $item->tipe = 'webinar';
                            $item->url = route('webinar.index'); // Asumsi link ke tabel webinar
                            return $item;
                              });
        $admins = User::select('name as judul', 'created_at', 'id')
        ->where('role', 'admin')
        ->latest()
        ->take(5)
        ->get()
        ->map(function($item){
            $item->tipe = 'Admin';
            $item->url = route('admin.users.index');
            return $item;
        });



    // 3. Gabungkan kedua collection
    $semuaAktivitas = $lombas->merge($webinars)->merge($admins);

    // 4. Urutkan gabungan berdasarkan 'created_at' dan ambil 5 teratas
    $aktivitasTerbaru = $semuaAktivitas->sortByDesc('created_at')->take(5);

        return view('halaman.dashboard', ['totalLomba'=>$jumlahLomba,
        'totalWebinar'=>$jumlahWebinar, 'aktivitasTerbaru' => $aktivitasTerbaru, 'totalAdmin'=>$jumlahAdmin,'totalPendaftar' => $totalPendaftar,

    ]);
    }
}
