<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PesertaAllExport; // export Excel
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AdminPesertaController extends Controller
{
    public function index(){
        $pesertaLomba = DB::table('user_lomba')
        ->select(
            'nama',
            'email',
            'noHp',
            'instansi',
            'pekerjaan',
            'created_at', //kasih alias
            'lomba_id as relasi_id',
            DB::raw("NULL as user_id"), //Buat kolom user_id palsu agar sama
            DB::raw("'Lomba' as tipe_kegiatan")
        );

        $pesertaWebinar = DB::table('user_webinar')
        ->select(
            'nama',
                'email',
                'noHp',
                'instansi',
                'pekerjaan',
                'created_at',
                'webinar_id as relasi_id', // Kita beri alias 'relasi_id' juga
                'user_id', // Ambil user_id asli
                DB::raw("'Webinar' as tipe_kegiatan")
        );

        //gabungin dua query
        $semuaPeserta = $pesertaLomba
        ->union($pesertaWebinar)
        ->orderBy('created_at', 'desc') //urutan berdasarkan data baru
        ->paginate(20);

            return view('halaman.peserta-admin', [
            'peserta' => $semuaPeserta
        ]);
    }

    // === EXPORT GABUNGAN ===
    // Export Excel gabungan
    public function exportAllExcel()
    {
        // Gabungkan data Lomba & Webinar
        $pesertaLomba = DB::table('user_lomba')->select(
            'nama','email','noHp','instansi','pekerjaan',
            'created_at','lomba_id as relasi_id',
            DB::raw("NULL as user_id"),
            DB::raw("'Lomba' as tipe_kegiatan")
        );

        $pesertaWebinar = DB::table('user_webinar')->select(
            'nama','email','noHp','instansi','pekerjaan',
            'created_at','webinar_id as relasi_id',
            'user_id',
            DB::raw("'Webinar' as tipe_kegiatan")
        );

        $semuaPeserta = $pesertaLomba->union($pesertaWebinar)->get();

        return Excel::download(new PesertaAllExport($semuaPeserta), 'laporan-peserta.xlsx');
    }

    // Export PDF gabungan
    public function exportAllPDF()
    {
        $pesertaLomba = DB::table('user_lomba')->select(
            'nama','email','noHp','instansi','pekerjaan',
            'created_at','lomba_id as relasi_id',
            DB::raw("NULL as user_id"),
            DB::raw("'Lomba' as tipe_kegiatan")
        );

        $pesertaWebinar = DB::table('user_webinar')->select(
            'nama','email','noHp','instansi','pekerjaan',
            'created_at','webinar_id as relasi_id',
            'user_id',
            DB::raw("'Webinar' as tipe_kegiatan")
        );

        $semuaPeserta = $pesertaLomba->union($pesertaWebinar)->orderBy('created_at','desc')->get();

        $dataLaporan = [
            'data' => $semuaPeserta,
            'periode' => now()->format('d F Y'),
            'judul' => 'Laporan Data Peserta Lomba & Webinar'
        ];

        $pdf = Pdf::loadView('halaman.report-peserta', $dataLaporan)
                  ->setPaper('a4', 'portrait');

        return $pdf->download('laporan-peserta.pdf');
    }

    // Export JPG gabungan
    public function exportAllJPG(): BinaryFileResponse
    {
        $pesertaLomba = DB::table('user_lomba')->select(
            'nama','email','noHp','instansi','pekerjaan',
            'created_at','lomba_id as relasi_id',
            DB::raw("NULL as user_id"),
            DB::raw("'Lomba' as tipe_kegiatan")
        );

        $pesertaWebinar = DB::table('user_webinar')->select(
            'nama','email','noHp','instansi','pekerjaan',
            'created_at','webinar_id as relasi_id',
            'user_id',
            DB::raw("'Webinar' as tipe_kegiatan")
        );

        $semuaPeserta = $pesertaLomba->union($pesertaWebinar)->orderBy('created_at','desc')->get();

        $dataLaporan = [
            'data' => $semuaPeserta,
            'periode' => now()->format('d F Y'),
            'judul' => 'Laporan Data Peserta Lomba & Webinar'
        ];

        $html = View::make('halaman.report-peserta', $dataLaporan)->render();

        $path = storage_path('app/public/laporan-peserta.jpg');

        Browsershot::html($html)
            ->windowSize(1200, 1080)
            ->fullPage()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
