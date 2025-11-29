<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\LombaUser;
use App\Http\Controllers\WebinarUser;
use App\Models\Lomba;
use App\Models\Pengumuman;
use App\Models\User;
use App\Models\userLomba;
use App\Models\userWebinar;
use App\Models\Webinar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;
use App\Exports\WebinarExport;
use App\Exports\LombaExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DashboardAdminController extends Controller
{
    public function index(){
        $jumlahLomba = Lomba::count();
        $jumlahWebinar = Webinar::count();
        $jumlahAdmin = User::where('role', 'admin')->count();

        $totalPendaftarLomba = DB::table('user_lomba')->count();
        $totalPendaftarWebinar = DB::table('user_webinar')->count();

        $totalPendaftar = $totalPendaftarLomba+$totalPendaftarWebinar;

        $lombas = Lomba::select('lomba as judul', 'created_at', 'id')
        ->latest() //mengurutkan descending
        ->take(5)
        ->get()
        //menambahkan properti baru setiap itemnya
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
        ->where('role', 'admin') //filter
        ->latest()
        ->take(5)
        ->get()
        ->map(function($item){
            $item->tipe = 'Admin';
            $item->url = route('admin.users.index');
            return $item;
        });
        $pengumuman = Pengumuman::select('judul as judul', 'created_at', 'id')
        ->where('status', 'published')
        ->latest()
        ->take(5)
        ->get()
        ->map(function($item){
            $item->tipe='pengumuman';
            $item->url=route('pengumuman.index');
            return $item;
        });



    //  Gabungkan  collection
    $semuaAktivitas = $lombas->merge($webinars)->merge($admins)->merge($pengumuman);
    //  Urutkan gabungan berdasarkan 'created_at' dan ambil 5 teratas
    $aktivitasTerbaru = $semuaAktivitas->sortByDesc('created_at')->take(5);

        return view('halaman.dashboard', [
            'totalLomba'=>$jumlahLomba,
            'totalWebinar'=>$jumlahWebinar,
            'aktivitasTerbaru' => $aktivitasTerbaru,
            'totalAdmin'=>$jumlahAdmin,
            'totalPendaftar' => $totalPendaftar,

    ]);
    }
     // === EXPORT WEBINAR ===

    // Export Webinar Excel
    public function exportWebinarExcel()
    {
        // Pastikan \App\Exports\WebinarExport mengambil data dari Model UserWebinar
        return Excel::download(new WebinarExport, 'data-webinar.xlsx');
    }
    // Export Webinar PDF 
    public function exportWebinarPDF()
    {
        // Ambil semua data peserta webinar beserta data webinar
        $dataPesertaWebinar = UserWebinar::with('webinar')->get();

        $dataLaporan = [
            'data' => $dataPesertaWebinar,
            'periode' => now()->format('d F Y'),
            'judul' => 'Laporan Data Pendaftar Webinar'
        ];

        // Render view
        $pdf = Pdf::loadView('halaman.report-webinar', $dataLaporan)
                ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-webinar.pdf');
    }

    // Export Webinar JPG
    public function exportWebinarJPG(): BinaryFileResponse
    {
        $dataPesertaWebinar = UserWebinar::with('webinar')->get();

        $dataLaporan = [
            'data' => $dataPesertaWebinar,
            'periode' => now()->format('d F Y'),
            'judul' => 'Laporan Data Pendaftar Webinar'
        ];

        $html = View::make('halaman.report-webinar', $dataLaporan)->render();

        $path = storage_path('app/public/laporan-webinar.jpg');

        Browsershot::html($html)
            ->windowSize(1200, 1080)
            ->fullPage()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
    
    // === EXPORT LOMBA ===

    // Export Lomba Excel
    public function exportExcelLomba()
    {
       return Excel::download(new LombaExport, 'data-peserta-lomba.xlsx');
    }
    
    // Export Lomba PDF
    public function exportPDFLomba(Request $request)
    {
        $dataPesertaLomba = UserLomba::with('lomba')->get();

        $dataLaporan = [
            'data'    => $dataPesertaLomba,
            'periode' => now()->format('d F Y'),
            'judul'   => 'Laporan Data Pendaftar Lomba'
        ];

        $pdf = Pdf::loadView('halaman.report-lomba', $dataLaporan)
            ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-lomba.pdf');
    }

    // Export Lomba JPG
    public function exportJPGLomba(Request $request)
    {
        $dataPesertaLomba = UserLomba::with('lomba')->get();

        $dataLaporan = [
            'data'    => $dataPesertaLomba,
            'periode' => now()->format('d F Y'),
            'judul'   => 'Laporan Data Pendaftar Lomba'
        ];

        $html = View::make('halaman.report-lomba', $dataLaporan)->render();

        $path = storage_path('app/public/laporan-lomba.jpg');

        Browsershot::html($html)
            ->windowSize(1200, 1080)
            ->fullPage()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }

}
